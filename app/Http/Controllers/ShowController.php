<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\IntensityRating;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $query = Show::where('is_published', true);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('cast', 'like', '%' . $request->search . '%');
            });
        }

        $sort = $request->get('sort', 'latest');
        match ($sort) {
            'title' => $query->orderBy('title'),
            'year' => $query->orderByDesc('release_year'),
            default => $query->latest(),
        };

        $shows = $query->paginate(12);

        return view('shows.index', compact('shows'));
    }

    public function show(Show $show)
    {
        if (!$show->is_published) {
            abort(404);
        }

        $show->load(['reviews.user', 'reviews.intensityRatings']);
        $intensityCategories = IntensityRating::CATEGORIES;
        $averageIntensity = $show->averageIntensityRatings();
        $averageRating = $show->averageOverallRating();

        return view('shows.show', compact('show', 'intensityCategories', 'averageIntensity', 'averageRating'));
    }

    public function movies()
    {
        $shows = Show::where('is_published', true)
            ->where('type', 'movie')
            ->latest()
            ->paginate(12);

        return view('shows.index', ['shows' => $shows, 'pageTitle' => 'Movies']);
    }

    public function tvShows()
    {
        $shows = Show::where('is_published', true)
            ->where('type', 'tv_show')
            ->latest()
            ->paginate(12);

        return view('shows.index', ['shows' => $shows, 'pageTitle' => 'TV Shows']);
    }
}
