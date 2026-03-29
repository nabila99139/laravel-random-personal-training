<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rasio Rushberry',
            'email' => 'rasiorushberry@gmail.com',
            'password' => Hash::make('password99'),
            'expired_at' => Carbon::now()->subDays(3),
            'is_active' => true
        ]);

        User::create([
            'name' => 'Felicia',
            'email' => 'felicia@gmail.com',
            'password' => Hash::make('password99'),
            'expired_at' => Carbon::now()->addDay(),
            'is_active' => true
        ]);

        User::create([
            'name' => 'karin',
            'email' => 'karin@gmail.com',
            'password' => Hash::make('password99'),
            'expired_at' => Carbon::now()->addMonths(3),
            'is_active' => true
        ]);
    }
}
