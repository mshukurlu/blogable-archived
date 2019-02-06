<?php

namespace Blogable\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    //

    protected $table='blogable_options';

    protected  $fillable = ['option_name','option_value'];
}
