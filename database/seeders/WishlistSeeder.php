<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    public function run()
    {
        DB::table('wishlist')->insert([
            [
                'user_id' => 1, // Change to an existing user ID
                'course_id' => 1, // Change to an existing course ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'course_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
