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
            'job_type' => 'Full-time'
        ]);

        DB::table('jobtypes')->insert([
            'job_type' => 'Part-time'
        ]);

        DB::table('jobtypes')->insert([
            'job_type' => 'All'
        ]);
    }
}
