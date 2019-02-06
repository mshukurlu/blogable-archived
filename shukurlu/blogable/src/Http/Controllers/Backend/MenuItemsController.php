<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 1/29/2019
 * Time: 3:02 PM
 */

namespace Blogable\Http\Controllers\Backend;


use Blogable\Repository\BlogRepository;
use Blogable\Repository\MenusRepository;
use Illuminate\Http\Request;

class MenuItemsController
{
    protected  $menuRepository,$blogrepository;

    public function __construct(MenusRepository $menusRepository,BlogRepository $blogRepository)
    {
        $this->menuRepository = $menusRepository;

        $this->blogrepository = $blogRepository;
    }

    public function index($menu,Request $request)
    {
        $data = $request->has('q') ? $this->menuRepository->search($request->input("q")) : $this->menuRepository->getAllItems($menu);

        return  view("blogable::backend.menu-items.index",compact('data'));
    }

    public function create($menu)
    {
        $posts = $this->blogrepository->get_pages('post');

        return view("blogable::backend.menu-items.create",compact("posts","menu"));
    }
    
    public function store($slug,Request $request)
    {

      return   $this->menuRepository->create($slug,$request);

    }

    public function edit($slug,$id)
    {
        $data = $this->menuRepository->getById($id);

        $posts = $this->blogrepository->get_pages('post');

        return view("blogable::backend.menu-items.edit",compact("data","slug","posts"));
    }

    public function update($slug,$id,Request $request)
    {
        return $this->menuRepository->update($id,$slug,$request);
    }

    public function destroy($id)
    {
        return $this->menuRepository->delete($id);
    }
}