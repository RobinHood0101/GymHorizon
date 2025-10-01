<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'weight'  => 'nullable|numeric',
            'repetitions'  => 'nullable|integer',
            'sets'  => 'nullable|integer',
            'place'  => 'nullable|string|max:255',
            'category_id' => 'required|exists:exercise_categories,id',
        ]);

        Exercise::create([
            'exercise_name' => $request->name,
            'description' => $request->description,
            'weight'  => $request->weight,
            'repetitions'  => $request->repetitions,
            'sets'  => $request->sets,
            'place'  => $request->place,
            'exercise_category_id' => $request->category_id,
        ]);

        return redirect()->route('uebungen.index')->with('success', 'Übung erfolgreich erstellt!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
