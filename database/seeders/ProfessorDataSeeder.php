<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfessorDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('professor_data')->insert([
            [
                'position' => 'Senior Lecturer',
                'company' => 'Tech University',
                'gender' => 'male',
                'birth_date' => Carbon::parse('1980-05-12'),
                'work_experience_years' => 15,
                'user_id' => 1, // Ensure user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position' => 'Assistant Professor',
                'company' => 'National Research Institute',
                'gender' => 'female',
                'birth_date' => Carbon::parse('1985-09-23'),
                'work_experience_years' => 10,
                'user_id' => 2, // Ensure user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
