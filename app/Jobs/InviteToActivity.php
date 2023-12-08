<?php

namespace App\Jobs;

use App\Mail\InviteMail;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InviteToActivity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Activity $activity,
        public string $text
    )
    { }

    public function handle(): void
    {
        foreach (
            User::query()->where("role", "=", "user")->get() as
            $user
        ) {
            Mail::to($user->email)->queue(new InviteMail($this->activity, $this->text));
            error_log("Sent to " . $user->email . "invite");
        }
    }
}
