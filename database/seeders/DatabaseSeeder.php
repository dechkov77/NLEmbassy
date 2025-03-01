<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\AchievementSeeder as SeedersAchievementSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            StudentDataSeeder::class,
            ProfessorDataSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            WishlistSeeder::class,
            ModuleSeeder::class,
            LessonSeeder::class,
            ViewSeeder::class,
            CourseProfessorSeeder::class,
            UserProgressSeeder::class,
            SeedersAchievementSeeder::class,
            UserAchievementSeeder::class,
            NewsletterSeeder::class,
            InterestSeeder::class,
            StudentInterestSeeder::class,
            UserCourseSeeder::class

        ]);
    }
}
