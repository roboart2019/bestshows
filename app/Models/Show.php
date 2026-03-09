<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'type', 'description', 'poster_image', 'banner_image',
        'genre', 'director', 'cast', 'release_year', 'network_or_studio',
        'mpaa_rating', 'tv_rating', 'seasons', 'episodes', 'runtime_minutes',
        'trailer_url', 'is_featured', 'is_published',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public static function booted(): void
    {
        static::creating(function ($show) {
            if (empty($show->slug)) {
                $show->slug = Str::slug($show->title);
            }
        });
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageOverallRating(): float
    {
        return round($this->reviews()->whereNotNull('overall_rating')->avg('overall_rating') ?? 0, 1);
    }

    public function averageIntensityRatings(): array
    {
        $categories = IntensityRating::CATEGORIES;
        $averages = [];

        foreach ($categories as $key => $label) {
            $avg = IntensityRating::whereHas('review', function ($q) {
                $q->where('show_id', $this->id);
            })->where('category', $key)->avg('rating');

            $averages[$key] = round($avg ?? 0, 1);
        }

        return $averages;
    }

    public function getStandardRatingAttribute(): ?string
    {
        return $this->type === 'movie' ? $this->mpaa_rating : $this->tv_rating;
    }
}
