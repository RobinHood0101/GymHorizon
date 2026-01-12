<?php

namespace App\Livewire;

use App\Models\ExerciseCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateExerciseCategory extends Component
{
    public string $name = '';

    public function save()
    {
        ExerciseCategory::create([
            'name' => $this->name,
            'user_id' => Auth::id(),
        ]);

        $this->reset('name');

        $this->dispatch('exercise-category-created');
    }

    public function render()
    {
        return view('livewire.create-exercise-category');
    }
}
