<?php

namespace App\Http\Controllers;

use App\Models\ExerciseCategory;
use Illuminate\Http\Request;

class ExerciseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exerciseCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:exercise_categories,category_name',
        ]);

        ExerciseCategory::create([
            'category_name' => $request->name,
        ]);

        return redirect()->route('uebungen.index')->with('success', 'Übungskategorie erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExerciseCategory $exerciseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExerciseCategory $exerciseCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExerciseCategory $exerciseCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExerciseCategory $exerciseCategory)
    {
        //
    }
}
