@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<h1 class="section-title">Dashboard</h1>

<div class="stat-cards">
    <div class="stat-card">
        <div class="number">{{ $stats['total_shows'] }}</div>
        <div class="label">Total Shows</div>
    </div>
    <div class="stat-card">
        <div class="number">{{ $stats['total_users'] }}</div>
        <div class="label">Members</div>
    </div>
    <div class="stat-card">
        <div class="number">{{ $stats['total_reviews'] }}</div>
        <div class="label">Reviews</div>
    </div>
    <div class="stat-card">
        <div class="number">{{ $stats['unread_messages'] }}</div>
        <div class="label">Unread Messages</div>
    </div>
</div>

<div class="grid-2">
    <div>
        <h2 style="margin-bottom: 1rem;">Latest Reviews</h2>
        @forelse($latestReviews as $review)
            <div style="background: var(--gray); padding: 0.8rem; border-radius: 4px; margin-bottom: 0.5rem;">
                <strong>{{ $review->user->name }}</strong> rated
                <a href="{{ route('shows.show', $review->show) }}" style="color: var(--primary);">{{ $review->show->title }}</a>
                <span class="badge badge-warning">{{ $review->overall_rating }}/10</span>
                <span style="color: var(--gray-lighter); font-size: 0.8rem;">{{ $review->created_at->diffForHumans() }}</span>
            </div>
        @empty
            <p style="color: var(--gray-lighter);">No reviews yet.</p>
        @endforelse
    </div>

    <div>
        <h2 style="margin-bottom: 1rem;">Unread Messages</h2>
        @forelse($latestMessages as $message)
            <a href="{{ route('admin.messages.show', $message) }}" style="display: block; background: var(--gray); padding: 0.8rem; border-radius: 4px; margin-bottom: 0.5rem;">
                <strong>{{ $message->name }}</strong> - {{ $message->subject }}
                <span style="color: var(--gray-lighter); font-size: 0.8rem; display: block;">{{ $message->created_at->diffForHumans() }}</span>
            </a>
        @empty
            <p style="color: var(--gray-lighter);">No unread messages.</p>
        @endforelse
    </div>
</div>
@endsection
