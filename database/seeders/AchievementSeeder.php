<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('achievements')->insert([
            [
                'id' => 1,
                'name' => 'Achievement 1',
                'description' => 'Description of achievement 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Achievement 2',
                'description' => 'Description of achievement 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Achievement 3',
                'description' => 'Description of achievement 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Achievement 4',
                'description' => 'Description of achievement 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Achievement 5',
                'description' => 'Description of achievement 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Achievement 6',
                'description' => 'Description of achievement 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Achievement 7',
                'description' => 'Description of achievement 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Achievement 8',
                'description' => 'Description of achievement 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Achievement 9',
                'description' => 'Description of achievement 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Achievement 10',
                'description' => 'Description of achievement 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
