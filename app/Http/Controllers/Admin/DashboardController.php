<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\User;
use App\Models\Review;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_shows' => Show::count(),
            'total_users' => User::count(),
            'total_reviews' => Review::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $latestReviews = Review::with(['user', 'show'])->latest()->take(10)->get();
        $latestMessages = ContactMessage::where('is_read', false)->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestReviews', 'latestMessages'));
    }
}
