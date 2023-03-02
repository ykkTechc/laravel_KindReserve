<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CalendarLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return view('layouts.calendar');
    }
}
