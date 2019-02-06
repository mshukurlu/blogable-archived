<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 1/29/2019
 * Time: 2:29 PM
 */

namespace Blogable\Http\Controllers\Backend;


use Blogable\Repository\MenusRepository;
use http\Env\Request;

class MenusController
{
    protected  $menusRepository;

    public function __construct(MenusRepository $menusRepository)
    {
        $this->menusRepository = $menusRepository;
    }


    public function index()
    {
        $data = $this->menusRepository->getAll();

        return view("blogable::backend.menus.index",compact('data'));
    }


    public function create()
    {
        return view("blogable::backend.menus.create");
    }

    public function store(Request $request)
    {
        return $this->menusRepository->store($request);
    }

    public function edit($id)
    {
        $data = $this->menusRepository->getById($id);

        return view("blogable::backend.menus.edit",compact("data"));
    }

    public function update($id,Request $request)
    {
        return $this->menusRepository->update($id,$request);
    }


}