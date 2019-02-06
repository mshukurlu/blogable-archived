<?php

namespace  Blogable\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blogable\Repository\BlogRepository;


class PostController extends Controller
{

    private $view_url = "blogable::frontend.pages.";

    protected $post;

    public function __construct(BlogRepository $post)
    {
        $this->post = $post;
    }

    public function  index($slug)
    {
        $post = $this->post->getBySlug($slug);

        return view($this->view_url."post",compact("post"));

    }
}