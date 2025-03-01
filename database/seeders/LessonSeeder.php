<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    public function run()
    {
        DB::table('lessons')->insert([
            [
                'module_id' => 1, // Example module_id
                'title' => 'Lesson 1: Introduction to Programming',
                'content' => 'This is the content for the introduction to programming lesson.',
                'video_url' => 'https://example.com/video1',
                'order_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id' => 1, // Example module_id
                'title' => 'Lesson 2: Variables and Data Types',
                'content' => 'This lesson covers variables and data types in programming.',
                'video_url' => 'https://example.com/video2',
                'order_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id' => 2, // Example module_id
                'title' => 'Lesson 1: Data Structures Overview',
                'content' => 'An introduction to basic data structures.',
                'video_url' => 'https://example.com/video3',
                'order_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id' => 2, // Example module_id
                'title' => 'Lesson 2: Arrays and Lists',
                'content' => 'Learn about arrays and lists as basic data structures.',
                'video_url' => 'https://example.com/video4',
                'order_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
