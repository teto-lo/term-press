<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SceneTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'svg',
        'meta_title',
        'meta_description',
    ];

    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(
            Term::class,
            'scene_term_term',
            'scene_term_id',
            'term_id'
        );
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
