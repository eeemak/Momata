<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'featured',
        'active',
    ];
    protected $dates = [
        'date',
    ];
    public static function featured_remain_count(){
        $max_feature = config('dashboard.modules.news.featured_max_item');
        $featured = self::where('featured', true)->count();
        return $max_feature - $featured;
    }
}
