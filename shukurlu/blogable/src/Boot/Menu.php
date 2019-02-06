<?php
/**
 *
 * User: Murad
 * Date: 1/29/2019
 * Time: 4:18 PM
 */

namespace Blogable\Boot;


class Menu
{

        protected $menu;

        public function __construct(Config $config)
        {
            $this->menu = file_exists(config_path('blogable.php')) ? include config_path('blogable.php'): "";
        }

}