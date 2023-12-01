<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'juven101@gmail.com',
            'first_name' => 'juven',
            'last_name' => 'tus',
            'photo_profile' => '',
            'birth_date' => Carbon::now(),
            'password' => '$2y$10$xw/5yS73uLY7TnUVE3UZ/OqxIW4cJDgbXuoq1K6KL2U158yK1Q2Wu'
        ]);
    }
}
