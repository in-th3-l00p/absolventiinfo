<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\AnnouncementController;
use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'email' => 'test@example.com',
         ]);

         \App\Models\User::factory()->create([
            "email" => "admin@example.com",
            "role" => "admin"
         ]);

        Announcement::factory(12)->create();
        Announcement::factory()->private()->create();

        Activity::factory(12)->create();
        Activity::factory(5)->unjoinable()->create();
        Activity::factory(5)->join_expired()->create();
    }
}
