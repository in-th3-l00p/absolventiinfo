<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\User;
use Exception;
use http\Env\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UploadUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $content
    ) {

    }

    public function handle(): void
    {
        $matrix = str_getcsv($this->content, "\n");
        for ($i = 1; $i < count($matrix); $i++) {
            try {
                $row = str_getcsv($matrix[$i], ",");
                $password = Str::random(12);
                if (User::query()->where("email", "=", $row[4])->exists())
                    continue;
                $user = User::create([
                    "first_name" => $row[1],
                    "last_name" => $row[2],
                    "birth_name" => $row[3],
                    "email" => $row[4],
                    "phone_number" => $row[5],
                    "promotion_year" => $row[6],
                    "class" => $row[7],
                    "password" => Hash::make($password)
                ]);

                Mail::to($user)->queue(new WelcomeMail($user, $password));
                error_log("User " . $user->email . " created");
            } catch (Exception $e) { }
        }
    }
}
