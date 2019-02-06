<?php

/*
 *
 *  Murad Shukurlu from Azerbaijan , Baku 08.01.2019
 *
 *  http://github.com/Murad-Shukurlu
 *
 */
namespace Blogable;

use App\Blogable\Core;
use Blogable\Boot\Config;
use Blogable\Boot\Hook;

use Blogable\Repository\BlogRepository;
use Blogable\Repository\CategoryRepository;
use Blogable\Repository\MenusRepository;
use Blogable\Repository\OptionsRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BlogableServiceProvider extends ServiceProvider
{

    private $core,$config;

    public function boot(BlogRepository $blogRepository,CategoryRepository $categoryRepository,MenusRepository $menusRepository,Config $config,OptionsRepository $optionsRepository)
    {

        Schema::defaultStringLength(191);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/./../resources/views',"blogable");

        $values = (object)[
        "allPosts"=>$blogRepository->getAll(),
        "categories"=>$categoryRepository->getAll(),
        "menus"=>$menusRepository->menus(),
        "all_menus"=>$config->get()->menus,
        "options"=>$optionsRepository->options(),
        "widgets"=>$config->get()->widgets
        ];

        View::share("blogable",$values);

    }

    public function register()
    {
        $this->publishables();

      // $hook_list = \App\Blogable\Provider::getlist();
       if(!$this->core)
       {
           $this->core = new Core;
       }

       $this->core->run();
    }

    public function publishables()
    {
        $basePath = dirname(__DIR__);

        $arrPublishable = [
            'migrations'=>
                [
                    "$basePath/publish/database/migrations"=>database_path('migrations'),
                ],
            'config'=>
                [
                    "$basePath/publish/config/blogable.php"=>config_path('blogable.php')
                ],
            'seeds'=>
                [
                    "$basePath/publish/database/seeds"=>database_path('seeds'),
                ],
            "blogable"=>
                [
                    "$basePath/publish/Core"=>base_path('app')
                ]
        ];

        foreach($arrPublishable as $group=>$paths)
        {
            $this->publishes($paths,$group);
        }
    }
}