<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRolesToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@admin.com')->first();

        if(isset($admin)) $admin->assignRole('admin');

        $users = User::whereNot('email', 'admin@admin.com')->get();

        foreach($users as $user){
            $user->assignRole('user');
        }
    }
}
