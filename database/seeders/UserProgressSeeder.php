<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgressSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_progress')->insert([
            [
                'user_id' => 1, // Example user_id
                'lesson_id' => 1, // Example lesson_id
                'completed' => true, // Marked as completed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Example user_id
                'lesson_id' => 1, // Example lesson_id
                'completed' => false, // Not completed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Example user_id
                'lesson_id' => 2, // Example lesson_id
                'completed' => false, // Not completed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Example user_id
                'lesson_id' => 3, // Example lesson_id
                'completed' => true, // Marked as completed
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
