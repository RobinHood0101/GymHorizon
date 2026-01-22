<?php

namespace App\Livewire;

use App\Models\ExerciseCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ExerciseCategoryForm extends Component
{
    #[Validate('required|min:3')]
    public string $name = '';
    public int $id;
    public string $submitAction = '';
    public string $buttonText = '';

    public function create()
    {
        $this->validate();

        ExerciseCategory::create([
            'name' => $this->name,
            'user_id' => Auth::id(),
        ]);

        $this->reset('name');

        $this->dispatch('exercise-category-created');
    }

    public function update()
    {
        $this->validate();

        $category = ExerciseCategory::findOrFail($this->id);

        $this->authorize('update', $category);

        $category->update([
            'name' => $this->name,
        ]);

        $this->dispatch('exercise-category-updated');
    }

    public function render()
    {
        return view('livewire.exercise-category-form');
    }
}
