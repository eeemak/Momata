<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'name',
        'description',
        'featured',
        'active',
    ];
    public static function featured_remain_count(){
        $max_feature = config('dashboard.modules.mission.featured_max_item');
        $featured = self::where('featured', true)->count();
        return $max_feature - $featured;
    }
}
