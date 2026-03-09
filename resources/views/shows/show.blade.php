@extends('layouts.app')
@section('title', $show->title)

@section('content')
<div class="layout-with-sidebar">
    <div>
        <!-- Show Header -->
        <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
            <div style="flex-shrink: 0; width: 250px;">
                <div class="poster" style="border-radius: 8px; overflow: hidden; aspect-ratio: 2/3; background: var(--gray);">
                    @if($show->poster_image)
                        <img src="{{ $show->poster_image }}" alt="{{ $show->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <span style="display: flex; align-items: center; justify-content: center; height: 100%; color: var(--gray-lighter);">No Poster</span>
                    @endif
                </div>
            </div>

            <div style="flex: 1;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                    <span class="type-badge" style="display: inline-block; background: var(--primary); padding: 0.2rem 0.6rem; border-radius: 3px; font-size: 0.8rem; text-transform: uppercase;">
                        {{ $show->type === 'movie' ? 'Movie' : 'TV Show' }}
                    </span>
                    @if($show->standard_rating)
                        <span style="background: var(--gray); padding: 0.2rem 0.6rem; border-radius: 3px; border: 1px solid var(--gray-lighter); font-size: 0.85rem;">
                            {{ $show->standard_rating }}
                        </span>
                    @endif
                </div>

                <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">{{ $show->title }}</h1>

                <p style="color: var(--gray-lighter); margin-bottom: 1rem;">
                    @if($show->release_year) {{ $show->release_year }} @endif
                    @if($show->genre) &middot; {{ $show->genre }} @endif
                    @if($show->runtime_minutes) &middot; {{ $show->runtime_minutes }} min @endif
                    @if($show->seasons) &middot; {{ $show->seasons }} season(s) @endif
                </p>

                @if($averageRating > 0)
                <div style="margin-bottom: 1rem;">
                    <span class="rating-badge" style="display: inline-block; background: var(--gold); color: #000; padding: 0.3rem 0.8rem; border-radius: 4px; font-weight: bold; font-size: 1.2rem;">
                        {{ $averageRating }}/10
                    </span>
                    <span style="color: var(--gray-lighter); margin-left: 0.5rem;">
                        ({{ $show->reviews->count() }} {{ Str::plural('review', $show->reviews->count()) }})
                    </span>
                </div>
                @endif

                @if($show->director)
                    <p><strong>Director:</strong> <span style="color: var(--gray-lighter);">{{ $show->director }}</span></p>
                @endif
                @if($show->cast)
                    <p><strong>Cast:</strong> <span style="color: var(--gray-lighter);">{{ $show->cast }}</span></p>
                @endif
                @if($show->network_or_studio)
                    <p><strong>{{ $show->type === 'movie' ? 'Studio' : 'Network' }}:</strong> <span style="color: var(--gray-lighter);">{{ $show->network_or_studio }}</span></p>
                @endif

                @if($show->description)
                    <p style="margin-top: 1rem; color: var(--gray-lighter); line-height: 1.7;">{{ $show->description }}</p>
                @endif

                @if($show->trailer_url)
                    <a href="{{ $show->trailer_url }}" target="_blank" class="btn btn-primary" style="margin-top: 1rem;">Watch Trailer</a>
                @endif
            </div>
        </div>

        <!-- Intensity Ratings Overview -->
        <h2 class="section-title">Intensity Ratings</h2>
        <div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
            @if(array_sum($averageIntensity) > 0)
                <div class="grid grid-2">
                    @foreach($intensityCategories as $key => $label)
                        @if(($averageIntensity[$key] ?? 0) > 0)
                        <div class="intensity-bar-container">
                            <div class="intensity-label">
                                <span>{{ $label }}</span>
                                <span>{{ $averageIntensity[$key] }}/10</span>
                            </div>
                            <div class="intensity-bar">
                                @php
                                    $val = $averageIntensity[$key];
                                    $class = $val <= 3 ? 'intensity-low' : ($val <= 6 ? 'intensity-med' : 'intensity-high');
                                @endphp
                                <div class="intensity-fill {{ $class }}" style="width: {{ $val * 10 }}%"></div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p style="text-align: center; color: var(--gray-lighter);">No intensity ratings yet. Be the first to rate!</p>
            @endif
        </div>

        <!-- In-Content Ad -->
        @php $contentAds = \App\Models\Adword::getActiveByPlacement('in_content'); @endphp
        @if($contentAds->count())
        <div style="text-align: center; margin: 1.5rem 0;">
            @foreach($contentAds as $ad)
                {!! $ad->ad_code !!}
            @endforeach
        </div>
        @endif

        <!-- Review Form (Members Only) -->
        @auth
        <h2 class="section-title">Submit Your Review</h2>
        <div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
            @php $existingReview = $show->reviews->where('user_id', Auth::id())->first(); @endphp
            <form method="POST" action="{{ route('reviews.store', $show) }}">
                @csrf
                <div class="form-group">
                    <label for="overall_rating">Overall Rating (1-10)</label>
                    <select name="overall_rating" id="overall_rating" class="form-control" style="width: auto;" required>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ ($existingReview && $existingReview->overall_rating == $i) ? 'selected' : '' }}>
                                {{ $i }} {{ $i === 10 ? '- Masterpiece' : ($i >= 8 ? '- Great' : ($i >= 6 ? '- Good' : ($i >= 4 ? '- Fair' : '- Poor'))) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="review_text">Your Review (Optional)</label>
                    <textarea name="review_text" id="review_text" class="form-control">{{ $existingReview->review_text ?? old('review_text') }}</textarea>
                </div>

                <h3 style="margin: 1.5rem 0 1rem; color: var(--gold);">Intensity Ratings (Optional, 0-10)</h3>
                <div class="grid grid-2">
                    @foreach($intensityCategories as $key => $label)
                        <div class="form-group">
                            <label for="intensity_{{ $key }}">{{ $label }}</label>
                            <input type="range" name="intensity[{{ $key }}]" id="intensity_{{ $key }}"
                                min="0" max="10"
                                value="{{ $existingReview ? ($existingReview->intensityRatings->where('category', $key)->first()->rating ?? 0) : 0 }}"
                                style="width: 100%;"
                                oninput="document.getElementById('val_{{ $key }}').textContent = this.value">
                            <span id="val_{{ $key }}" style="color: var(--gold); font-weight: bold;">
                                {{ $existingReview ? ($existingReview->intensityRatings->where('category', $key)->first()->rating ?? 0) : 0 }}
                            </span>/10
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem; margin-top: 1rem;">
                    {{ $existingReview ? 'Update Review' : 'Submit Review' }}
                </button>
            </form>
        </div>
        @else
        <div style="background: var(--gray); padding: 2rem; border-radius: 8px; margin-bottom: 2rem; text-align: center;">
            <p style="margin-bottom: 1rem;">Want to rate and review this show?</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary" style="margin-left: 0.5rem;">Sign Up Free</a>
        </div>
        @endauth

        <!-- Existing Reviews -->
        <h2 class="section-title">Member Reviews ({{ $show->reviews->count() }})</h2>
        @forelse($show->reviews as $review)
            <div style="background: var(--gray); padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                    <strong>{{ $review->user->name }}</strong>
                    <div>
                        <span class="rating-badge">{{ $review->overall_rating }}/10</span>
                        @if(Auth::check() && (Auth::id() === $review->user_id || Auth::user()->isAdmin()))
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this review?')">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
                @if($review->review_text)
                    <p style="color: var(--gray-lighter); line-height: 1.6;">{{ $review->review_text }}</p>
                @endif
                <p style="color: var(--gray-lighter); font-size: 0.8rem; margin-top: 0.5rem;">{{ $review->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <p style="color: var(--gray-lighter);">No reviews yet. Be the first!</p>
        @endforelse
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        @php $sidebarAds = \App\Models\Adword::getActiveByPlacement('sidebar'); @endphp
        @if($sidebarAds->count())
            @foreach($sidebarAds as $ad)
                <div class="ad-slot">{!! $ad->ad_code !!}</div>
            @endforeach
        @endif
    </aside>
</div>
@endsection
