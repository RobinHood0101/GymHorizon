<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingPlan\DestroyTrainingPlanRequest;
use App\Http\Requests\TrainingPlan\EditTrainingPlanRequest;
use App\Http\Requests\TrainingPlan\StoreTrainingPlanRequest;
use App\Http\Requests\TrainingPlan\UpdateTrainingPlanRequest;
use App\Models\ExerciseCategory;
use App\Models\TrainingPlan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
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
        if (Auth::user()->cannot('create', TrainingPlan::class)) {
            abort(403);
        }
        $exerciseCategories = ExerciseCategory::whereUserId(Auth::user()->id)
            ->get()
            ->load('exercises');
        return view('training_plans.create', compact('exerciseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingPlanRequest $request): RedirectResponse
    {
        $plan = Auth::user()->trainingPlans()->create([
            'name' => $request->name,
            'duration' => $request->duration,
            'notes' => $request->notes,
            'user_id' => Auth::id(),
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
    public function edit(EditTrainingPlanRequest $request, TrainingPlan $training_plan)
    {
        $exerciseCategories = ExerciseCategory::whereUserId(Auth::user()->id)
            ->get()
            ->load('exercises');
        $plan = $training_plan->load('exercises');
        return view('training_plans.edit', compact('plan'), ['exerciseCategories' => $exerciseCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingPlanRequest $request, TrainingPlan $trainingPlan): RedirectResponse
    {
        $trainingPlan->update([
            'name' => $request->get('name'),
            'duration' => $request->get('duration'),
            'notes' => $request->get('notes'),
            'user_id' => Auth::id(),
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

            $trainingPlan->exercises()->sync($pivotData);
        }
        return redirect()->route('training-plans.index')->with('success', 'TrainingPlan erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyTrainingPlanRequest $request, TrainingPlan $trainingPlan): RedirectResponse
    {
        $trainingPlan->exercises()->detach();
        $trainingPlan->forceDelete();

        return redirect()->route('training-plans.index')
            ->with('success', 'TrainingPlan erfolgreich gelöscht!');
    }
}
