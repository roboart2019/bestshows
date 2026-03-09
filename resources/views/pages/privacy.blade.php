@extends('layouts.app')
@section('title', 'Privacy Policy')

@section('content')
<div style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--gray-lighter);">
    <h1 class="section-title">Privacy Policy</h1>

    <p style="margin-bottom: 1.5rem;">Last updated: {{ date('F j, Y') }}</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Information We Collect</h2>
    <p style="margin-bottom: 1rem;">We collect information you provide directly, including your name, email address, and any reviews or ratings you submit as a member.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">How We Use Your Information</h2>
    <p style="margin-bottom: 1rem;">Your information is used to provide our services, display community ratings and reviews, and improve your experience on our platform.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Advertising</h2>
    <p style="margin-bottom: 1rem;">We use third-party advertising services including Google AdWords to display ads on our site. These services may use cookies to serve ads based on your interests.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Analytics</h2>
    <p style="margin-bottom: 1rem;">We use Google Analytics to understand how visitors use our site. This service collects anonymous usage data to help us improve our content and user experience.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Contact</h2>
    <p>For privacy-related inquiries, please <a href="{{ route('contact') }}" style="color: var(--primary);">contact us</a>.</p>
</div>
@endsection
