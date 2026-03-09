<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Review;
use App\Models\IntensityRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Show $show)
    {
        $validated = $request->validate([
            'overall_rating' => 'required|integer|min:1|max:10',
            'review_text' => 'nullable|string|max:5000',
            'intensity' => 'nullable|array',
            'intensity.*' => 'nullable|integer|min:0|max:10',
        ]);

        $review = Review::updateOrCreate(
            ['user_id' => Auth::id(), 'show_id' => $show->id],
            [
                'overall_rating' => $validated['overall_rating'],
                'review_text' => $validated['review_text'] ?? null,
            ]
        );

        if (!empty($validated['intensity'])) {
            foreach ($validated['intensity'] as $category => $rating) {
                if ($rating !== null && $rating > 0) {
                    IntensityRating::updateOrCreate(
                        ['review_id' => $review->id, 'category' => $category],
                        ['rating' => $rating]
                    );
                }
            }
        }

        return redirect()->route('shows.show', $show)
            ->with('success', 'Your review has been submitted!');
    }

    public function destroy(Review $review)
    {
        if ($review->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $show = $review->show;
        $review->delete();

        return redirect()->route('shows.show', $show)
            ->with('success', 'Review deleted.');
    }
}
