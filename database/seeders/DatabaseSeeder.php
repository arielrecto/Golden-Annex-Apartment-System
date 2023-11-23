<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('ariel123')
        ]);

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $tenantRole = Role::create([
            'name' => 'tenant'
        ]);



        $admin->assignRole($adminRole);
    }
}
