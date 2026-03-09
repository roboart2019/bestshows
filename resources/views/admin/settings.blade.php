@extends('layouts.admin')
@section('title', 'Site Settings')

@section('content')
<h1 class="section-title">Site Settings</h1>

<form method="POST" action="{{ route('admin.settings.update') }}" style="max-width: 700px;">
    @csrf @method('PUT')

    <!-- Google Analytics Section -->
    <div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
        <h2 style="margin-bottom: 1rem; color: var(--gold);">Google Analytics</h2>

        <div class="form-group">
            <label for="google_analytics_id">Google Analytics Measurement ID</label>
            <input type="text" id="google_analytics_id" name="google_analytics_id" class="form-control"
                value="{{ old('google_analytics_id', $settings['google_analytics_id']) }}"
                placeholder="G-XXXXXXXXXX or UA-XXXXXXXX-X">
            <small style="color: var(--gray-lighter);">Enter your Google Analytics 4 Measurement ID (starts with G-) or Universal Analytics Tracking ID (starts with UA-).</small>
        </div>

        <div class="form-group">
            <label class="form-check">
                <input type="hidden" name="google_analytics_enabled" value="0">
                <input type="checkbox" name="google_analytics_enabled" value="1"
                    {{ old('google_analytics_enabled', $settings['google_analytics_enabled']) === '1' ? 'checked' : '' }}>
                Enable Google Analytics tracking
            </label>
        </div>
    </div>

    <!-- General Settings -->
    <div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
        <h2 style="margin-bottom: 1rem; color: var(--gold);">General Settings</h2>

        <div class="form-group">
            <label for="site_name">Site Name</label>
            <input type="text" id="site_name" name="site_name" class="form-control"
                value="{{ old('site_name', $settings['site_name']) }}">
        </div>

        <div class="form-group">
            <label for="site_description">Site Description</label>
            <textarea id="site_description" name="site_description" class="form-control" style="min-height: 80px;">{{ old('site_description', $settings['site_description']) }}</textarea>
        </div>

        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="email" id="contact_email" name="contact_email" class="form-control"
                value="{{ old('contact_email', $settings['contact_email']) }}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Save Settings</button>
</form>
@endsection
