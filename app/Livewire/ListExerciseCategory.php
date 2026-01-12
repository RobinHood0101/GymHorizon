<?php

namespace App\Livewire;

use App\Models\ExerciseCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class ListExerciseCategory extends Component
{
    #[On('exercise-category-created')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    public function delete(int $id)
    {
        ExerciseCategory::findOrFail($id)->delete();

        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.list-exercise-category')->with([
            'exerciseCategories' => ExerciseCategory::all()
        ]);
    }
}
