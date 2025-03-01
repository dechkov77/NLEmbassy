<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::all();
        return view('interests.index', compact('interests'));
    }

    public function create()
    {
        return view('interests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:interests',
            'description' => 'required|string',
        ]);

        Interest::create($request->all());
        return redirect()->route('interests.index')->with('success', 'Interest added successfully!');
    }

    public function edit(Interest $interest, Request $request)
    {
        $interest = Interest::find($request->id);
        return view('interests.edit', compact('interest'));
    }

    public function update(Request $request, Interest $interest)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:interests,name,' . $interest->id,
            'description' => 'required|string',
        ]);

        $interest = Interest::find($request->id);
        $interest->update($request->all());
        return redirect()->route('interests.index')->with('success', 'Interest updated successfully!');
    }

    public function destroy(Interest $interest, Request $request)
{
    $interest = Interest::find($request->id);
    $interest->delete();

    return redirect()->route('interests.index')->with('success', 'Interest deleted successfully!');
}

}
