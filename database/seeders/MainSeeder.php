<?php

namespace Database\Seeders;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\JobDetail;
use App\Models\JobType;
use App\Models\UserInfo;
// use App\Models\Applicant;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserInfo::factory(10)->create();
        JobType::factory(10)->create();
        Job::factory(10)->create();
        JobDetail::factory(10)->create();
        Applicant::factory(10)->create();
    }
}
