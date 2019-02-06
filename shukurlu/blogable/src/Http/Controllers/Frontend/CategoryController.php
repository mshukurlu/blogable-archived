<?php

namespace  Blogable\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blogable\Repository\CategoryRepository;

class CategoryController extends Controller
{

    private $view_url = 'blogable::frontend.pages.';

    protected  $category;

    public function __construct(CategoryRepository $category)
    {

        $this->category = $category;

    }

    public function  index($slug)
    {

        $posts = $this->category->getBySlug($slug)->blogable;

        return view($this->view_url."category",compact("posts"));
    }
}