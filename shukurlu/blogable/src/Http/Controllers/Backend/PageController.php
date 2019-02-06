<?php
/**
 * User: Murad Shukurlu
 * Date: 1/27/2019
 * Time: 5:24 PM
 *
 */

namespace Blogable\Http\Controllers\Backend;

use Blogable\Repository\BlogRepository;
use Illuminate\Http\Request;

class PageController
{
    protected  $blogRepository;

    public  function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public  function  index(Request $request)
    {
        $posts = $request->has("q") ? $this->blogRepository->search($request->input('q'))
                 :
                 $this->blogRepository->getAll();

        return view("blogable::backend.pages.index",compact("posts"));
    }

    public function create()
    {
        return view("blogable::backend.pages.create");
    }

    public function store(Request $request)
    {
       // dd($request->all());
      return  $this->blogRepository->create($request);
    }

    public function edit($id)
    {

        $post = $this->blogRepository->getById($id);

        return view("blogable::backend.pages.edit",compact("post"));
    }

    public function update($id,Request $request)
    {

       // $request->validate(['title'=>'required']);
      return $this->blogRepository->update($id,$request);
    }

    public function show($id)
    {

    }

    public function destroy($id)
    {
       return $this->blogRepository->delete($id);
    }


}