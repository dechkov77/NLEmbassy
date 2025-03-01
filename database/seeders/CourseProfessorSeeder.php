<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseProfessorSeeder extends Seeder
{
    public function run()
    {
        DB::table('course_professor')->insert([
            [
                'course_id' => 1, // Example course_id
                'user_id' => 1, // Example user_id (professor)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1, // Example course_id
                'user_id' => 2, // Example user_id (professor)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2, // Example course_id
                'user_id' => 3, // Example user_id (professor)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
