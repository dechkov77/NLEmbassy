<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestSeeder extends Seeder
{
    public function run()
    {
        DB::table('interests')->insert([
            [
                'name' => 'Technology',
                'description' => 'All things related to technological advancements and innovations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business',
                'description' => 'Interest in entrepreneurship, startups, and business strategies.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health & Fitness',
                'description' => 'Focus on maintaining a healthy lifestyle through exercise, diet, and wellness.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Art & Design',
                'description' => 'Exploring creativity through visual arts, design, and architecture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Travel',
                'description' => 'Interest in exploring new places, cultures, and experiences.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
