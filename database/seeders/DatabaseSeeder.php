<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Applicant;
use App\Models\JobDetail;
use App\Models\JobType;
use App\Models\UserInfo;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserInfoSeeder::class,
            JobTypeSeeder::class,
            JobSeeder::class,
            JobDetailSeeder::class,
            ApplicantSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
