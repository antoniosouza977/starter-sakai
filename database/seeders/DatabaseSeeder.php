<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::query()->updateOrCreate([
            'name'  => 'Test',
            'email' => 'test@example.com'
        ], [
            'name'     => 'Test',
            'email'    => 'test@example.com',
            'password' => Hash::make('UDK66mSJOy'),
        ]);

    }
}
