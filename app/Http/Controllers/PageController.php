<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Adword;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredShows = Show::where('is_published', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $latestShows = Show::where('is_published', true)
            ->latest()
            ->take(12)
            ->get();

        $sidebarAds = Adword::getActiveByPlacement('sidebar');

        return view('pages.home', compact('featuredShows', 'latestShows', 'sidebarAds'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
