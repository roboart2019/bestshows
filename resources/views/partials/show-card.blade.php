<a href="{{ route('shows.show', $show) }}" class="card show-card">
    <div class="poster">
        @if($show->poster_image)
            <img src="{{ $show->poster_image }}" alt="{{ $show->title }}">
        @else
            <span>No Poster</span>
        @endif
    </div>
    <div class="card-body">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.3rem;">
            <span class="type-badge">{{ $show->type === 'movie' ? 'Movie' : 'TV Show' }}</span>
            @if($show->averageOverallRating() > 0)
                <span class="rating-badge">{{ $show->averageOverallRating() }}/10</span>
            @endif
        </div>
        <h3 class="card-title">{{ $show->title }}</h3>
        <p style="color: var(--gray-lighter); font-size: 0.85rem;">
            {{ $show->release_year }}
            @if($show->standard_rating) &middot; {{ $show->standard_rating }} @endif
            @if($show->genre) &middot; {{ $show->genre }} @endif
        </p>
    </div>
</a>
