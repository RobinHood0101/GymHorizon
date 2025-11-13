<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeekPlan;
use Illuminate\Auth\Access\Response;

class WeekPlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WeekPlan $weekPlan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WeekPlan $weekPlan): bool
    {
        return $user->id === $weekPlan->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WeekPlan $weekPlan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WeekPlan $weekPlan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WeekPlan $weekPlan): bool
    {
        return $user->id === $weekPlan->user_id;
    }
}
