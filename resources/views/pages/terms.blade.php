@extends('layouts.app')
@section('title', 'Terms of Service')

@section('content')
<div style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--gray-lighter);">
    <h1 class="section-title">Terms of Service</h1>

    <p style="margin-bottom: 1.5rem;">Last updated: {{ date('F j, Y') }}</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Membership</h2>
    <p style="margin-bottom: 1rem;">By creating an account, you agree to provide accurate information and use the platform responsibly. Members can submit reviews and ratings for movies and TV shows.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Content Guidelines</h2>
    <p style="margin-bottom: 1rem;">Reviews must be honest and respectful. We reserve the right to remove content that violates our guidelines, including spam, hate speech, or misleading reviews.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Intellectual Property</h2>
    <p style="margin-bottom: 1rem;">All original content on Best Shows Entertainment is owned by us. Movie and TV show information is used for review and commentary purposes under fair use.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Limitation of Liability</h2>
    <p style="margin-bottom: 1rem;">Best Shows Entertainment provides reviews and ratings for informational purposes. We are not liable for any decisions made based on our content.</p>

    <h2 style="color: var(--white); margin: 1.5rem 0 0.5rem;">Contact</h2>
    <p>Questions about these terms? <a href="{{ route('contact') }}" style="color: var(--primary);">Contact us</a>.</p>
</div>
@endsection
