<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'body',
        'short_description',
        'example',
        'key_points',
        'usage_scenarios',
        'meta_description',
        'custom_ad_code',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'key_points' => 'array',
        'usage_scenarios' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scenes(): BelongsToMany
    {
        return $this->belongsToMany(
            SceneTerm::class,
            'scene_term_term',
            'term_id',
            'scene_term_id'
        );
    }
}
