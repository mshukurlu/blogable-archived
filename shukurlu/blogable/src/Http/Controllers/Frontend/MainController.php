<?php

namespace  Blogable\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    private $view_url = 'blogable::frontend.pages.';


    public function  index()
    {

        return view($this->view_url."index");

    }
}