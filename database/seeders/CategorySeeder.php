<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Science', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Mathematics', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Literature', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Technology', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Business', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'History', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Art', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Health', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
