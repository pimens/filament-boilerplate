<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'opd_id' => '1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);
        $this->call([
            OpdSeeder::class,
        ]);
    }
}
