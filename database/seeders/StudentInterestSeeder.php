<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentInterestSeeder extends Seeder
{
    public function run()
    {
        DB::table('student_interests')->insert([
            [
                'user_id' => 1, // Example user_id (student)
                'interest_id' => 1, // Example interest_id (Technology)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Example user_id (student)
                'interest_id' => 2, // Example interest_id (Business)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Example user_id (student)
                'interest_id' => 3, // Example interest_id (Health & Fitness)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Example user_id (student)
                'interest_id' => 4, // Example interest_id (Art & Design)
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
