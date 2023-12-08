<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\User;
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
        public $path
    ) {
    }

    public function handle(): void
    {
        $file = fopen($this->path, "r");
        $row = fgetcsv($file, 1000, ","); // skipping first one
        while (($row = fgetcsv($file, 1000, ",")) !== false) {
            $password = Str::random(12);
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
        }

        fclose($file);
    }
}
