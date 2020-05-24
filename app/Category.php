<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    /**
     * Get all tweets of this Category
     */
    public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }
}
