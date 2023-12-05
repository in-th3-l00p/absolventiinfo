<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\AnnouncementController;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()->create([
             'email' => 'test@example.com',
         ]);

         User::factory()->create([
            "email" => "admin@example.com",
            "role" => "admin"
         ]);

         User::factory(20)->create();

        Announcement::factory(12)->create();
        Announcement::factory()->private()->create();

        Activity::factory(12)->create();
        Activity::factory(5)->unjoinable()->create();
        Activity::factory(5)->join_expired()->create();

        // making some participants
        for ($i = 0; $i < 50; $i++) {
            $activity = Activity::query()
                ->where("can_join", "=", 1)
                ->inRandomOrder()
                ->first();
            $user = User::query()
                ->where("role", "=", "user")
                ->inRandomOrder()
                ->first();
            while ($activity->users()->where("user_id", "=", $user->id)->exists())
                $user = User::query()
                    ->where("role", "=", "user")
                    ->inRandomOrder()
                    ->first();
            $activity->users()->attach($user, ["accepted" => rand(0, 1)]);
        }

        // making a full activity
        $activity = Activity::factory()->create([
            "max_joins" => 3
        ]);
        foreach (User::query()
            ->where("role", "=", "user")
            ->inRandomOrder()
            ->limit(3)
            ->get() as $user) {
            $activity->users()->attach($user, [ "user" => $activity ]);
        }

    }
}
