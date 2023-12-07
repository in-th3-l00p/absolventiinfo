<?php

namespace App\View\Components\admin;

use App\Models\Activity;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ParticipantActions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Activity $activity,
        public User $user,
        public bool $accepted
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.participant-actions');
    }
}
