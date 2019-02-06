<?php

namespace Blogable\Models;

use Blogable\Boot\Config;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    protected $table='blogable';

    protected  $fillable = ['category_id','title','text','user_id','slug','image','type','is_published',''];

    public function category()
    {
        return $this->belongsTo("Blogable\Models\Category");
    }

    public function user()
    {

        return $this->belongsTo(Config::get('user_model')->user_model);
    }
}
