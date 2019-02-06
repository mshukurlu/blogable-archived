<?php

namespace  Blogable\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blogable\Repository\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected  $searchRepository;

    public function __construct(SearchRepository $search)
    {
        $this->searchRepository = $search;
    }

    public function  index(Request $request)
    {
        $keyword = $request->input('q');

        $posts = $this->searchRepository->getResults($keyword);

        return view("blogable::frontend.pages.search",compact("posts"));
    }
}