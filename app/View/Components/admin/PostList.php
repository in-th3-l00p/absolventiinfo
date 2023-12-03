<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $name,
        public string $empty,
        public mixed $posts,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.post-list');
    }
}
