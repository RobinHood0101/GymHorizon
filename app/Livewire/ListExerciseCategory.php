<?php

namespace App\Livewire;

use App\Models\ExerciseCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListExerciseCategory extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';

    public string $name;

    #[On('exercise-category-created')]
    #[On('exercise-category-updated')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }
    
    public function delete(int $id)
    {
        $exerciseCategory = ExerciseCategory::findOrFail($id);

        $this->authorize('delete', $exerciseCategory);

        $exerciseCategory->delete();

        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.list-exercise-category')->with([
            'exerciseCategories' => ExerciseCategory::whereUserId(auth()->id())->paginate(5)
        ]);
    }
}
