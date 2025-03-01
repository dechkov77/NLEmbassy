<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViewSeeder extends Seeder
{
    public function run()
    {
        DB::table('views')->insert([
            [
                'user_id' => 1, // Example user_id
                'lesson_id' => 1, // Example lesson_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Example user_id
                'lesson_id' => 1, // Example lesson_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Example user_id
                'lesson_id' => 2, // Example lesson_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Example user_id
                'lesson_id' => 3, // Example lesson_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
