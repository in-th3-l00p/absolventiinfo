<?php

namespace App\View\Components;

use App\Models\Activity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class JoinButton extends Component
{
    public function __construct(
        public Activity $activity
    ) { }

    public function render(): View|Closure|string
    {
        return view(
            'components.join-button',
            $this->activity->isJoined(Auth::user())
        );
    }
}
