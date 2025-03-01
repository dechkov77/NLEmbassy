<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'admin',
            'user'
        ];

        foreach ($roles as $role){
            Role::firstOrCreate(['role' =>$role]);
        };
    }
}
