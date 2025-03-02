<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCourseSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_courses')->insert([
            [
                'user_id' => 2, // Example user_id
                'course_id' => 1, // Example course_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Example user_id
                'course_id' => 2, // Example course_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Example user_id
                'course_id' => 3, // Example course_id
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
