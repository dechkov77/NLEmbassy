<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('course')->get();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('modules.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        Module::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Module added successfully!');
    }

    public function edit(Request $request, Module $module)
    {
        $module = Module::find($request->id);
        $courses = Course::all();
        return view('modules.edit', compact('module', 'courses'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $module = Module::find($request->id);
        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
    }

    public function destroy(Request $request, Module $module)
    {
        $module = Module::find($request->id);
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully!');
    }
}

