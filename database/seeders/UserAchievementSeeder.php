<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAchievementSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_achievements')->insert([
            [
                'achievement_id' => 1, // Example achievement_id (Master Coder)
                'user_id' => 1, // Example user_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'achievement_id' => 2, // Example achievement_id (Quick Learner)
                'user_id' => 2, // Example user_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'achievement_id' => 3, // Example achievement_id (Consistent Learner)
                'user_id' => 3, // Example user_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
