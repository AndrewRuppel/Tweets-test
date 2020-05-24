<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'category_id',
        'username',
        'content'
    ];

    /**
    * Get category of this tweet
    */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }
}
