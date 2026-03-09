@extends('layouts.app')
@section('title', $pageTitle ?? 'Browse Shows')

@section('content')
<h1 class="section-title">{{ $pageTitle ?? 'Browse All Shows' }}</h1>

<!-- Search & Filter -->
<form method="GET" action="{{ route('shows.index') }}" style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
    <input type="text" name="search" class="form-control" placeholder="Search titles, cast..." value="{{ request('search') }}" style="flex: 1; min-width: 200px;">
    <select name="type" class="form-control" style="width: auto;">
        <option value="">All Types</option>
        <option value="movie" {{ request('type') === 'movie' ? 'selected' : '' }}>Movies</option>
        <option value="tv_show" {{ request('type') === 'tv_show' ? 'selected' : '' }}>TV Shows</option>
    </select>
    <select name="sort" class="form-control" style="width: auto;">
        <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Latest</option>
        <option value="title" {{ request('sort') === 'title' ? 'selected' : '' }}>Title A-Z</option>
        <option value="year" {{ request('sort') === 'year' ? 'selected' : '' }}>Year</option>
    </select>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<!-- Between Listings Ad -->
@php $listingAds = \App\Models\Adword::getActiveByPlacement('between_listings'); @endphp

@if($shows->count())
<div class="grid grid-4">
    @foreach($shows as $index => $show)
        @include('partials.show-card', ['show' => $show])

        @if($index === 3 && $listingAds->count())
            <div style="grid-column: 1 / -1; text-align: center; padding: 1rem;">
                @foreach($listingAds as $ad)
                    {!! $ad->ad_code !!}
                @endforeach
            </div>
        @endif
    @endforeach
</div>

<div class="pagination">
    {{ $shows->withQueryString()->links('partials.pagination') }}
</div>
@else
<div style="text-align: center; padding: 4rem; color: var(--gray-lighter);">
    <h2>No shows found</h2>
    <p>Try adjusting your search criteria.</p>
</div>
@endif
@endsection
