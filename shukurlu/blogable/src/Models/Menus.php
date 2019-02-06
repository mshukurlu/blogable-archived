<?php

namespace Blogable\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //

    protected $table='blogable_menus';

    protected $fillable = ['name','url','menu_slug','parent_id','blog_id','url_type','order'];

    public function sub_menus()
    {
        return $this->hasMany("Blogable\Models\Menus","parent_id","id");
    }
}
