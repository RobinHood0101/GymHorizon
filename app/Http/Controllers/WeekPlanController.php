<?php

namespace App\Http\Controllers;

use App\Models\DayPlan;
use App\Models\Exercise;
use App\Models\WeekPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeekPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weekPlans = Auth::user()->weekPlans()->get();
        return view('week_plans.index', compact('weekPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('week_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'days' => 'required|array',
            'title' => 'required|string',
        ]);

        $weekPlan = WeekPlan::create([
            'user_id' => auth()->id(),
            'title'    => $request->title,
        ]);

        foreach ($request->days as $day) {
            $weekPlan->dayPlans()->create([
                'day'              => $day['day'],
                'plan_id' => $day['plan_id'],
                'notes'            => $day['notes'],
            ]);
        }

        return redirect()->route('wochenplan.index')->with('success', 'Wochenplan erfolgreich erstellt!');

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
        $weekPlan = Auth::user()->weekPlans()->with(['dayPlans'])->findOrFail($id);
        return view('week_plans.edit', compact('weekPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'days' => 'required|array',
            'title' => 'required|string',
        ]);

        $weekPlan = Auth::user()->weekPlans()->findOrFail($id);
        $weekPlan->update([
            'title'    => $request->title,
        ]);

        // Update existing day plans and create new ones
        $existingDayPlanIds = $weekPlan->dayPlans->pluck('id')->toArray();
        $submittedDayPlanIds = array_filter(array_column($request->days, 'id'));

        // Delete day plans that were removed
        $dayPlansToDelete = array_diff($existingDayPlanIds, $submittedDayPlanIds);
        DayPlan::destroy($dayPlansToDelete);

        foreach ($request->days as $day) {
            if (isset($day['id']) && in_array($day['id'], $existingDayPlanIds)) {
                // Update existing day plan
                $dayPlan = DayPlan::find($day['id']);
                $dayPlan->update([
                    'day'              => $day['day'],
                    'plan_id' => $day['plan_id'],
                    'notes'            => $day['notes'],
                ]);
            } else {
                // Create new day plan
                $weekPlan->dayPlans()->create([
                    'day'              => $day['day'],
                    'plan_id' => $day['plan_id'],
                    'notes'            => $day['notes'],
                ]);
            }
        }

        return redirect()->route('wochenplan.index')->with('success', 'Wochenplan erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, WeekPlan $wochenplan)
    {
        // Policy geht nicht
//        if ($request->user()->cannot('delete', $weekPlan)) {
//            abort(403);
//        }
        $wochenplan->dayPlans()->forceDelete();
        $wochenplan->forceDelete();

        return redirect()->route('wochenplan.index')->with('success', 'Wochenplan erfolgreich gelöscht!');
    }
}
