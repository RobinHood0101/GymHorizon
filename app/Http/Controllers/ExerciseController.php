<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyExerciseRequest;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $exerciseCategories = $user->exerciseCategories()
            ->with('exercises')
            ->get();

        $exercises = $user->exercises()
            ->with('exerciseCategory')
            ->get();

        return view('exercises.index', compact('exercises', 'exerciseCategories'));
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
    public function store(StoreExerciseRequest $request): RedirectResponse
    {
        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'place' => $request->place,
            'exercise_category_id' => $request->category_id,
            'user_id' => Auth::id(),
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
    public function update(UpdateExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'place' => $request->place,
            'exercise_category_id' => $request->category_id,
        ]);

        return redirect()->route('exercises.index')->with('success', 'übung erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->forceDelete();
        return redirect()->route('exercises.index')->with('success', 'übung erfolgreich gelöscht!');
    }
}
