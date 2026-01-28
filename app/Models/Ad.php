<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'code',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'priority' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePosition($query, string $position)
    {
        return $query->where('position', $position);
    }

    public static function getForPosition(string $position): ?string
    {
        $ad = self::active()
            ->position($position)
            ->orderBy('priority', 'desc')
            ->first();

        if ($ad) {
            return $ad->code;
        }

        // 広告未設定の場合はデフォルトAdSenseを表示
        return SiteSetting::getDefaultAdsense();
    }
}
