<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $message;
    public $id;
    public $title;
    public $isCentered;
    public $onConfirm;

    public function __construct($message, $id, $title, $isCentered, $onConfirm)
    {
        $this->message = $message;
        $this->id = $id;
        $this->title = $title;
        $this->isCentered = $isCentered;
        $this->onConfirm = $onConfirm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
