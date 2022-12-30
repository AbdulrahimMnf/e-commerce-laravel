<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'admin']);
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'demo@example.com',
            'password'=>Hash::make('demo')
        ])->syncRoles(['admin']);
    }
}
