<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create Team Leader Role
        $tlRole = Role::firstOrCreate(['name' => 'team_leader'], ['display_name' => 'Team Leader']);

        // Create Intern Role
        $internRole = Role::firstOrCreate(['name' => 'intern'], ['display_name' => 'Intern']);

        // Add a sample Team Leader
        User::firstOrCreate(['email' => 'tl@example.com'], [
            'name' => 'Team Leader',
            'password' => Hash::make('password'),
            'role_id' => $tlRole->id,
        ]);

        // Add a sample Intern
        User::firstOrCreate(['email' => 'intern@example.com'], [
            'name' => 'Intern User',
            'password' => Hash::make('password'),
            'role_id' => $internRole->id,
        ]);
    }
}
