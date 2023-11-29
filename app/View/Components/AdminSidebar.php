<?php

namespace App\View\Components;

use Closure;
use http\Env\Request;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current = explode("/", \Illuminate\Support\Facades\Request::route()->uri)[1];
        return view('components.admin-sidebar', [
            "current" => $current
        ]);
    }
}
