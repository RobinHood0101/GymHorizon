<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('exercises.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('exercises.create', ['category' => ExerciseCategory::findOrFail($request->get('category'))]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'place'  => 'nullable|string|max:255',
            'category_id' => 'required|exists:exercise_categories,id',
        ]);

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'place'  => $request->place,
            'exercise_category_id' => $request->category_id,
        ]);

        return redirect()->route('exercises.index')->with('success', 'Übung erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise):  RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255,',
            'description' => 'nullable|string|max:1000',
            'place'  => 'nullable|string|max:255',
            'category_id' => 'required|exists:exercise_categories,id',
        ]);

        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'place'  => $request->place,
            'exercise_category_id' => $request->category_id,
        ]);

        return redirect()->route('exercises.index')->with('success', 'übung erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->forceDelete();
        return redirect()->route('exercises.index')->with('success', 'übung erfolgreich gelöscht!');
    }
}
