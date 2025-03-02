<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Course;
use App\Models\Interest;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function landingCourses() {
        $courses = Course::with(['category','professors' => function ($query) {
            $query->where('role_id', 3);
        }])->get();

        return response()->json($courses);
    }

    public function previewMode(Request $request) {
        $user_id = Auth::user()->id;
        $course_id = $request->id;

        $course = Course::with([
            'modules' => function ($query) {
                $query->orderBy('order');
            },
            'modules.lessons' => function ($query) {
                $query->orderBy('order_number');
            }
        ])->find($request->id);


        $lectureCount = Lesson::whereHas('module', function ($query) use ($request) {
            $query->where('course_id', $request->id);
        })->count();



        $completedLessons = DB::table('user_progress')
        ->join('lessons', 'user_progress.lesson_id', '=', 'lessons.id')
        ->join('modules', 'lessons.module_id', '=', 'modules.id')
        ->where('user_progress.user_id', $user_id)
        ->where('modules.course_id', $course_id)
        ->where('user_progress.completed', 1)
        ->count();


        return response()->json([
            'course' => $course,
            'percentage_completed_user' => $completedLessons/$lectureCount
        ]);
    }

    public function lessonFinished(Request $request) {
        $lesson = Lesson::findOrFail($request->id);
        $user = Auth::user();

        $progress = UserProgress::firstOrNew([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
        ]);

        $progress->completed = !$progress->completed;
        $progress->save();

        return response()->json([
            'message' => 'Lesson progress updated successfully',
            'completed' => $progress->completed
        ]);
    }

    public function learningMode(Request $request) {
        $course_id = $request->id;

        $course = Course::with([
            'category',
            'professors' => function ($query) {
                $query->where('role_id', 2);
            }
        ])->find($course_id);


        $course_category = $course->category->name;

        $number_of_modules = $course->modules->count();

        $number_of_lectures = 0;

        foreach($course->modules as $module) {
            foreach($module->lessons as $lesson) {
                $number_of_lectures++;
            }
        }

        return response()->json([
            'course' => $course,
            'course_category' => $course_category,
            'number_of_modules' => $number_of_modules,
            'number_of_lectures' => $number_of_lectures
        ]);
    }

    public function userProfile() {
        $logged_in_user = Auth::user();
        $user = User::with('courses', 'studentData', 'interests', 'progress', 'achievements')->find(2);
        $number_user_courses = $user->courses->count();
        $number_user_achievements = $user->achievements->count();
        
        $all_courses_count = Course::count();
        $all_achievements_count = Achievement::count();

        $percentage_user_courses = $number_user_courses/$all_courses_count;
        $percentage_user_achievements = $number_user_achievements/$all_achievements_count;
        $random_courses = Course::with('category')->inRandomOrder()->limit(3)->get();

        return response()->json([
            'user' => $user,
            'percentage_user_courses' => $percentage_user_courses,
            'percentage_user_achievements' => $percentage_user_achievements,
            'recommended_courses' => $random_courses
        ]);
    }

    public function coursesBoard() {
        $courses = Course::with('categories')->get();

        return response()->json($courses);
    }

    public function allInterests() {
        $interests = Interest::all();

        return response()->json($interests);
    }

    public function studentOnboarding(Request $request) {
        $user = Auth::user();
        $user->interests->attach($request->interests);

        return response()->json(['message' => 'Student onboarding complete!']);
    }

    public function professorDashboard() {
        $user = Auth::user();
        $professorId = $user->id;
        $professor_data = User::with('professorData', 'courses')->find($user->id);

        $num_of_students = User::whereHas('progress', function ($query) use ($professorId) {
            $query->whereHas('lesson.module.course.professors', function ($q) use ($professorId) {
                $q->where('users.id', $professorId);
            });
        })->where('role_id', 2) // Ensure they are students
        ->distinct()
        ->count();

        
        $num_of_lessons =  Lesson::whereHas('module.course.professors', function ($query) use ($professorId) {
                $query->where('users.id', $professorId);
            })->count();

        return response()->json([
            'professor_data' => $professor_data,
            'num_students' => $num_of_students,
            'num_of_lessons' => $num_of_lessons
        ]);
    }

    public function isProfessor() {
        $user = Auth::user();

        // if (!$user) {
        //     return response()->json(['error' => 'User not authenticated'], 401);
        // }

        if($user->role->role == 'user') {
            return response()->json(['is_professor' => True]);
        } else if ($user->role->role == 'professor') {
            return response()->json(['is_professor' => False]);
        }
    }
}
