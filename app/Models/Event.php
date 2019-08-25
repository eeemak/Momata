<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'vanue',
        'google_map_url',
        'featured',
        'active',
    ];
    protected $dates = [
        'start_date',
        'end_date',
    ];
    public static function featured_remain_count(){
        $max_feature = config('dashboard.modules.event.featured_max_item');
        $featured = self::where('featured', true)->count();
        return $max_feature - $featured;
    }
}
