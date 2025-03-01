<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsletterSeeder extends Seeder
{
    public function run()
    {
        DB::table('newsletter_subscription')->insert([
            [
                'user_id' => 1, // Example user_id
                'email' => 'user1@example.com', // Example email
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Example user_id
                'email' => 'user2@example.com', // Example email
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Example user_id
                'email' => 'user3@example.com', // Example email
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
