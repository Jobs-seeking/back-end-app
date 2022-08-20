<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobtypes')->insert([
            'job_type' => "Mobile"
        ]);

        DB::table('jobtypes')->insert([
            'job_type' => "Testing"
        ]);

        DB::table('jobtypes')->insert([
            'job_type' => "Front end"
        ]);
        DB::table('jobtypes')->insert([
            'job_type' => "Back end"
        ]);
        DB::table('jobtypes')->insert([
            'job_type' => "Full Stack "
        ]);
        DB::table('jobtypes')->insert([
            'job_type' => "BA"
        ]);
    }
}
