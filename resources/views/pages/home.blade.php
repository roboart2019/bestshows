@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="layout-with-sidebar">
    <div>
        <!-- Hero Section -->
        <div style="background: linear-gradient(135deg, var(--primary-dark), var(--darker)); padding: 3rem; border-radius: 8px; margin-bottom: 2rem; text-align: center;">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Best Shows Entertainment</h1>
            <p style="font-size: 1.2rem; color: var(--gray-lighter); margin-bottom: 1.5rem;">Your trusted source for honest movie and TV show reviews with detailed intensity ratings.</p>
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('shows.movies') }}" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1.1rem;">Browse Movies</a>
                <a href="{{ route('shows.tv') }}" class="btn btn-secondary" style="padding: 0.8rem 2rem; font-size: 1.1rem;">Browse TV Shows</a>
            </div>
        </div>

        <!-- Featured Shows -->
        @if($featuredShows->count())
        <h2 class="section-title">Featured</h2>
        <div class="grid grid-3" style="margin-bottom: 2rem;">
            @foreach($featuredShows as $show)
                @include('partials.show-card', ['show' => $show])
            @endforeach
        </div>
        @endif

        <!-- In-Content Ad -->
        @php $contentAds = \App\Models\Adword::getActiveByPlacement('in_content'); @endphp
        @if($contentAds->count())
        <div style="text-align: center; margin: 1.5rem 0;">
            @foreach($contentAds as $ad)
                {!! $ad->ad_code !!}
            @endforeach
        </div>
        @endif

        <!-- Latest Shows -->
        <h2 class="section-title">Latest Additions</h2>
        <div class="grid grid-4">
            @foreach($latestShows as $show)
                @include('partials.show-card', ['show' => $show])
            @endforeach
        </div>

        @if($latestShows->isEmpty() && $featuredShows->isEmpty())
        <div style="text-align: center; padding: 4rem 2rem; color: var(--gray-lighter);">
            <h2>No shows yet</h2>
            <p>Check back soon for reviews and ratings!</p>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        @if(isset($sidebarAds) && $sidebarAds->count())
            @foreach($sidebarAds as $ad)
                <div class="ad-slot">{!! $ad->ad_code !!}</div>
            @endforeach
        @endif

        <div class="ad-slot">
            <h3 style="margin-bottom: 1rem;">Join Our Community</h3>
            <p style="color: var(--gray-lighter); margin-bottom: 1rem;">Sign up to rate and review your favorite shows!</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary" style="width: 100%;">Sign Up Free</a>
            @endguest
        </div>
    </aside>
</div>
@endsection
