<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adword;
use Illuminate\Http\Request;

class AdwordController extends Controller
{
    public function index()
    {
        $adwords = Adword::orderBy('placement')->orderBy('sort_order')->get();
        $placements = Adword::PLACEMENTS;
        return view('admin.adwords.index', compact('adwords', 'placements'));
    }

    public function create()
    {
        $placements = Adword::PLACEMENTS;
        return view('admin.adwords.create', compact('placements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'placement' => 'required|in:' . implode(',', array_keys(Adword::PLACEMENTS)),
            'ad_code' => 'required|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Adword::create($validated);

        return redirect()->route('admin.adwords.index')->with('success', 'Ad placement created!');
    }

    public function edit(Adword $adword)
    {
        $placements = Adword::PLACEMENTS;
        return view('admin.adwords.edit', compact('adword', 'placements'));
    }

    public function update(Request $request, Adword $adword)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'placement' => 'required|in:' . implode(',', array_keys(Adword::PLACEMENTS)),
            'ad_code' => 'required|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $adword->update($validated);

        return redirect()->route('admin.adwords.index')->with('success', 'Ad placement updated!');
    }

    public function destroy(Adword $adword)
    {
        $adword->delete();
        return redirect()->route('admin.adwords.index')->with('success', 'Ad placement deleted.');
    }
}
