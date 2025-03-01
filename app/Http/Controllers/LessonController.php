<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('module')->get();
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('lessons.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'required|url',
            'order_number' => 'required|integer',
        ]);

        Lesson::create($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson added successfully!');
    }

    public function edit(Request $request, Lesson $lesson)
    {
        $lesson = Lesson::find($request->id);
        $modules = Module::all();
        return view('lessons.edit', compact('lesson', 'modules'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'required|url',
            'order_number' => 'required|integer',
        ]);

        $lesson = Lesson::find($request->id);
        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Request $request,Lesson $lesson)
    {
        $lesson = Lesson::find($request->id);
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully!');
    }
}

