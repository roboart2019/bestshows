<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adword extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'placement', 'ad_code', 'is_active', 'sort_order'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const PLACEMENTS = [
        'header' => 'Header',
        'sidebar' => 'Sidebar',
        'footer' => 'Footer',
        'in_content' => 'In Content',
        'between_listings' => 'Between Listings',
    ];

    public static function getActiveByPlacement(string $placement)
    {
        return static::where('placement', $placement)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }
}
