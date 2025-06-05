<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'rating',
        'price',
        'image_url',
        'features',
        'category'
    ];

    protected $casts = [
        'features' => 'array',
        'rating' => 'float',
        'price' => 'integer',
    ];

    public static function search($query)
    {
        return self::where('name', 'like', "%{$query}%")
            ->orWhere('location', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->get();
    }

    public static function getRecommendations($query)
    {
        // Get destinations with similar category or location
        // Excluding exact matches that would appear in search results
        return self::where(function($q) use ($query) {
            $q->where('category', 'like', "%{$query}%")
                ->orWhere('location', 'like', "%{$query}%");
        })
        ->where('name', 'not like', "%{$query}%")
        ->orderBy('rating', 'desc')
        ->limit(3)
        ->get();
    }
}
