<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
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
}
