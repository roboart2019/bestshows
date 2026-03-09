<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bestshows.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        SiteSetting::set('site_name', 'Best Shows Entertainment');
        SiteSetting::set('site_description', 'Your trusted source for honest movie and TV show reviews with detailed intensity ratings.');
        SiteSetting::set('google_analytics_id', '');
        SiteSetting::set('google_analytics_enabled', '0');
    }
}
