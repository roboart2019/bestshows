@extends('layouts.app')
@section('title', 'About Us')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <h1 class="section-title">About Best Shows Entertainment</h1>

    <div style="line-height: 1.8; color: var(--gray-lighter);">
        <p style="margin-bottom: 1.5rem; font-size: 1.1rem;">
            Welcome to <strong style="color: var(--white);">Best Shows Entertainment</strong> &mdash; your go-to destination for honest, detailed reviews of movies and TV shows.
        </p>

        <p style="margin-bottom: 1.5rem;">
            We go beyond standard ratings. Our unique <strong style="color: var(--gold);">Intensity Rating System</strong> gives you detailed breakdowns across dozens of content categories, so you know exactly what you're getting into before you watch.
        </p>

        <h2 style="color: var(--white); margin: 2rem 0 1rem;">What Makes Us Different</h2>

        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 1rem; padding-left: 1.5rem; border-left: 3px solid var(--primary);">
                <strong style="color: var(--white);">Detailed Intensity Ratings</strong> &mdash; We rate shows on 24+ content categories including violence, psychological themes, political content, and more.
            </li>
            <li style="margin-bottom: 1rem; padding-left: 1.5rem; border-left: 3px solid var(--primary);">
                <strong style="color: var(--white);">Community Driven</strong> &mdash; Our members contribute ratings and reviews, giving you a diverse range of perspectives.
            </li>
            <li style="margin-bottom: 1rem; padding-left: 1.5rem; border-left: 3px solid var(--primary);">
                <strong style="color: var(--white);">No Spoilers</strong> &mdash; We focus on content intensity and quality without ruining the story.
            </li>
        </ul>

        <h2 style="color: var(--white); margin: 2rem 0 1rem;">Join Our Community</h2>

        <p style="margin-bottom: 1.5rem;">
            Become a member to rate and review shows, help other viewers make informed choices, and connect with fellow entertainment enthusiasts.
        </p>

        @guest
        <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 0.8rem 2rem;">Become a Member</a>
        @endguest
    </div>
</div>
@endsection
