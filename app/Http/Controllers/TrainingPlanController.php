<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use App\Models\TrainingPlan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingPlanController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Auth::user()->trainingPlans()->with(['exercises'])->get();
        return view('training_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exerciseCategories = ExerciseCategory::all()->load('exercises');
        return view('training_plans.create', compact('exerciseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric|max:2000',
            'notes' => 'nullable|string',

            'exercises' => 'nullable|array',
            'exercises.*' => 'exists:exercises,id',

            'weights' => 'nullable|array',
            'weights.*' => 'nullable|numeric|min:0',

            'reps' => 'nullable|array',
            'reps.*' => 'nullable|integer|min:0',

            'sets' => 'nullable|array',
            'sets.*' => 'nullable|integer|min:0',
        ]);

        $plan = Auth::user()->trainingPlans()->create([
            'name' => $request->name,
            'duration' => $request->duration,
            'notes' => $request->notes,
        ]);

        // save pivot data
        if ($request->has('exercises')) {
            $pivotData = [];

            foreach ($request->exercises as $i => $exerciseId) {
                $pivotData[$exerciseId] = [
                    'weight' => $request->weights[$i] ?? null,
                    'repetitions' => $request->reps[$i] ?? null,
                    'sets' => $request->sets[$i] ?? null,
                ];
            }

            $plan->exercises()->sync($pivotData);
        }

        return redirect()->route('training-plans.index')->with('success', 'TrainingPlan erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exerciseCategories = ExerciseCategory::all()->load('exercises');
        $plan = Auth::user()->trainingPlans()->with(['exercises'])->findOrFail($id);
        return view('training_plans.edit', compact('plan'), ['exerciseCategories' => $exerciseCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingPlan $trainingPlan)
    {
        // Policy geht nicht
        if ($request->user()->cannot('update', $trainingPlan)) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|numeric|max:2000',
            'notes' => 'nullable|string',
            'exercises' => 'nullable|array',
            'exercises.*' => 'exists:exercises,id',
        ]);

        $trainingPlan->update([
            'name' => $request->get('name'),
            'duration' => $request->get('duration'),
            'notes' => $request->get('notes'),
        ]);

        if ($request->has('exercises')) {
            $trainingPlan->exercises()->sync($request->exercises);
        }

        return redirect()->route('training-plans.index')->with('success', 'TrainingPlan erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, TrainingPlan $trainingPlan)
    {
        // Wichtig: {plan} muss identisch heißen wie der Parameter im Controller (TrainingPlan $plan). pa route:list
        if ($request->user()->cannot('delete', $trainingPlan)) {
            abort(403);
        }

        $trainingPlan->exercises()->detach();
        $trainingPlan->forceDelete();

        return redirect()->route('training-plans.index')
            ->with('success', 'TrainingPlan erfolgreich gelöscht!');
    }
}
