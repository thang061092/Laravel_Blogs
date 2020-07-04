<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function category()
    {
    return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
}
