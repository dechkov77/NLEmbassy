<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Carbon\Carbon;

class StudentDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('student_data')->insert([
            [
                'gender' => 'male',
                'birth_date' => Carbon::parse('2005-06-15'),
                'school_year' => '2023/2024',
                'field_of_study' => 'Computer Science',
                'current_school' => 'High School of Technology',
                'user_id' => 1, // Ensure user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gender' => 'female',
                'birth_date' => Carbon::parse('2006-08-22'),
                'school_year' => '2023/2024',
                'field_of_study' => 'Mathematics',
                'current_school' => 'National Science Academy',
                'user_id' => 2, // Ensure user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
