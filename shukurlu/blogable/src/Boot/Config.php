<?php
namespace Blogable\Boot;

class Config
{

    public static function get()
    {
        if(file_exists(config_path('blogable.php')))
        {
                $config = include(config_path('blogable.php'));

                return json_decode(json_encode($config));
        }
    }


}

