<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowManageController extends Controller
{
    public function index()
    {
        $shows = Show::latest()->paginate(20);
        return view('admin.shows.index', compact('shows'));
    }

    public function create()
    {
        return view('admin.shows.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:movie,tv_show',
            'description' => 'nullable|string',
            'poster_image' => 'nullable|string|max:500',
            'banner_image' => 'nullable|string|max:500',
            'genre' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string|max:1000',
            'release_year' => 'nullable|integer|min:1900|max:2030',
            'network_or_studio' => 'nullable|string|max:255',
            'mpaa_rating' => 'nullable|string',
            'tv_rating' => 'nullable|string',
            'seasons' => 'nullable|integer|min:1',
            'episodes' => 'nullable|integer|min:1',
            'runtime_minutes' => 'nullable|integer|min:1',
            'trailer_url' => 'nullable|url|max:500',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published', true);

        Show::create($validated);

        return redirect()->route('admin.shows.index')->with('success', 'Show created successfully!');
    }

    public function edit(Show $show)
    {
        return view('admin.shows.edit', compact('show'));
    }

    public function update(Request $request, Show $show)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:movie,tv_show',
            'description' => 'nullable|string',
            'poster_image' => 'nullable|string|max:500',
            'banner_image' => 'nullable|string|max:500',
            'genre' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string|max:1000',
            'release_year' => 'nullable|integer|min:1900|max:2030',
            'network_or_studio' => 'nullable|string|max:255',
            'mpaa_rating' => 'nullable|string',
            'tv_rating' => 'nullable|string',
            'seasons' => 'nullable|integer|min:1',
            'episodes' => 'nullable|integer|min:1',
            'runtime_minutes' => 'nullable|integer|min:1',
            'trailer_url' => 'nullable|url|max:500',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published', true);

        $show->update($validated);

        return redirect()->route('admin.shows.index')->with('success', 'Show updated successfully!');
    }

    public function destroy(Show $show)
    {
        $show->delete();
        return redirect()->route('admin.shows.index')->with('success', 'Show deleted.');
    }
}
