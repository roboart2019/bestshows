<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'google_analytics_id' => SiteSetting::get('google_analytics_id', ''),
            'google_analytics_enabled' => SiteSetting::get('google_analytics_enabled', '0'),
            'site_name' => SiteSetting::get('site_name', 'Best Shows Entertainment'),
            'site_description' => SiteSetting::get('site_description', ''),
            'contact_email' => SiteSetting::get('contact_email', ''),
        ];

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'google_analytics_id' => 'nullable|string|max:50',
            'google_analytics_enabled' => 'boolean',
            'site_name' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:1000',
            'contact_email' => 'nullable|email|max:255',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::set($key, $key === 'google_analytics_enabled' ? ($request->boolean('google_analytics_enabled') ? '1' : '0') : $value);
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated!');
    }
}
