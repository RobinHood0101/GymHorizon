<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PdfExportButton extends Component
{
    public string $type;
    public ?string $label;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type, ?string $label = null)
    {
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pdf-export-button');
    }
}
