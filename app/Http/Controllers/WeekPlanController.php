<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeekPlan\DestroyWeekPlanRequest;
use App\Http\Requests\WeekPlan\StoreWeekPlanRequest;
use App\Http\Requests\WeekPlan\UpdateWeekPlanRequest;
use App\Models\DayPlan;
use App\Models\WeekPlan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class WeekPlanController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weekPlans = Auth::user()->weekPlans()->with('dayPlans')->get();
        return view('week_plans.index', compact('weekPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', WeekPlan::class);
        return view('week_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeekPlanRequest $request): RedirectResponse
    {
        $weekPlan = WeekPlan::create([
            'user_id' => auth()->id(),
            'title'    => $request->title,
        ]);

        foreach ($request->days as $day) {
            $weekPlan->dayPlans()->create([
                'day'              => $day['day'],
                'training_plan_id' => $day['training_plan_id'],
                'notes'            => $day['notes'],
            ]);
        }
        return redirect()->route('week-plans.index')->with('success', 'Wochenplan erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WeekPlan $weekPlan)
    {
        $this->authorize('update', $weekPlan);
        $weekPlan->load('dayPlans');
        return view('week_plans.edit', compact('weekPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeekPlanRequest $request, WeekPlan $weekPlan): RedirectResponse
    {
        $weekPlan->update([
            'title'    => $request->title,
        ]);

        // Update existing day plans and create new ones
        $existingDayPlanIds = $weekPlan->dayPlans->pluck('id')->toArray();

        foreach ($request->days as $day) {
            if (isset($day['id']) && in_array($day['id'], $existingDayPlanIds)) {
                // Update existing day plan
                $dayPlan = DayPlan::findOrFail($day['id']);
                $dayPlan->update([
                    'day'              => $day['day'],
                    'training_plan_id' => $day['training_plan_id'],
                    'notes'            => $day['notes'],
                ]);
            }
        }

        return redirect()->route('week-plans.index')->with('success', 'Wochenplan erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyWeekPlanRequest $request, WeekPlan $weekPlan): RedirectResponse
    {
        $weekPlan->dayPlans()->forceDelete();
        $weekPlan->forceDelete();

        return redirect()->route('week-plans.index')->with('success', 'Wochenplan erfolgreich gelöscht!');
    }
}
