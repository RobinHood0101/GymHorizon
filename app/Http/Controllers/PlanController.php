<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Plan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Auth::user()->plans()->with(['exercises'])->get();
        return view('training_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exercises = Exercise::all();
        return view('training_plans.create', compact('exercises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'duration' => 'required|numeric|max:2000',
            'notes' => 'nullable|string',
            'exercises' => 'nullable|array',
            'exercises.*' => 'exists:exercises,id',
        ]);

        $plan = Auth::user()->plans()->create([
            'plan_name' => $request->get('plan_name'),
            'duration' => $request->get('duration'),
            'notes' => $request->get('notes'),
        ]);

        if ($request->has('exercises')) {
            $plan->exercises()->sync($request->exercises);
        }

        return redirect()->route('trainingsplan.index')->with('success', 'Plan erfolgreich erstellt!');
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
        $plan = Auth::user()->plans()->with(['exercises'])->findOrFail($id);
        $exercises = Exercise::all();
        return view('training_plans.edit', compact('plan'), ['exercises' => $exercises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $trainingsplan)
    {
        // Policy geht nicht
        if ($request->user()->cannot('update', $trainingsplan)) {
            abort(403);
        }

        $request->validate([
            'plan_name' => 'required|string|max:255',
            'duration' => 'required|numeric|max:2000',
            'notes' => 'nullable|string',
            'exercises' => 'nullable|array',
            'exercises.*' => 'exists:exercises,id',
        ]);

        $trainingsplan->update([
            'plan_name' => $request->get('plan_name'),
            'duration' => $request->get('duration'),
            'notes' => $request->get('notes'),
        ]);

        if ($request->has('exercises')) {
            $trainingsplan->exercises()->sync($request->exercises);
        }

        return redirect()->route('trainingsplan.index')->with('success', 'Plan erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Plan $trainingsplan)
    {
        // Wichtig: {plan} muss identisch heißen wie der Parameter im Controller (Plan $plan). pa route:list
        if ($request->user()->cannot('delete', $trainingsplan)) {
            abort(403);
        }

        $trainingsplan->exercises()->detach();
        $trainingsplan->forceDelete();

        return redirect()->route('trainingsplan.index')
            ->with('success', 'Plan erfolgreich gelöscht!');
    }
}
