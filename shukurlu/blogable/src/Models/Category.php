<?php

namespace Blogable\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table='blogable_category';

    protected $fillable = ['name','parent_id','slug'];

    public  function blogable()
    {
        return $this->hasMany("Blogable\Models\Blog");
    }
}
