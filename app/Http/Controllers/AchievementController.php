<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Achievement::create($request->all());
        return redirect()->route('achievements.index')->with('success', 'Achievement added successfully!');
    }

    public function edit(Request $request, Achievement $achievement)
    {
        $achievement = Achievement::find($request->id);
        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $achievement = Achievement::find($request->id);
        $achievement->update($request->all());
        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully!');
    }

    public function destroy(Request $request, Achievement $achievement)
    {
        $achievement = Achievement::find($request->id);
        $achievement->delete();
        return redirect()->route('achievements.index')->with('success', 'Achievement deleted successfully!');
    }
}

