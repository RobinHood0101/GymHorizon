<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseCategory\DestroyExerciseCategoryRequest;
use App\Http\Requests\ExerciseCategory\EditExerciseCategoryRequest;
use App\Http\Requests\ExerciseCategory\StoreExerciseCategoryRequest;
use App\Http\Requests\ExerciseCategory\UpdateExerciseCategoryRequest;
use App\Models\ExerciseCategory;
use Illuminate\Support\Facades\Auth;

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
    public function store(StoreExerciseCategoryRequest $request)
    {
        ExerciseCategory::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('exercises.index')->with('success', 'Übungskategorie erfolgreich erstellt!');
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
    public function edit(EditExerciseCategoryRequest $request, ExerciseCategory $exerciseCategory)
    {
        return view('exerciseCategories.edit', compact('exerciseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseCategoryRequest $request, ExerciseCategory $exerciseCategory)
    {
        $exerciseCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('exercises.index')->with('success', 'Übungskategorie erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyExerciseCategoryRequest $request, ExerciseCategory $exerciseCategory)
    {
        $exerciseCategory->forceDelete();

        return redirect()->route('exercises.index')->with('success', 'Übungskategorie erfolgreich gelöscht!');
    }
}
