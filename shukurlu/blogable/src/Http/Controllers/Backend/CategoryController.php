<?php
/**
 * User: Murad
 * Date: 1/29/2019
 * Time: 12:13 PM
 */

namespace Blogable\Http\Controllers\Backend;


use Blogable\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController
{
    protected  $categoryRepository;

    public function __construct(CategoryRepository $category)
    {
        $this->categoryRepository = $category;
    }

    public function index(Request $request)
    {
        $posts = $request->has("q") ? $this->categoryRepository->search($request->input('q'))
                 :
                 $this->categoryRepository->getAll();

        return view("blogable::backend.category.index",compact("posts"));
    }

    public function create()
    {
        return view("blogable::backend.category.create");
    }

    public function store(Request $request)
    {
        return $this->categoryRepository->create($request);
    }

    public function edit($id)
    {
        $data = $this->categoryRepository->getById($id);

        return view("blogable::backend.category.edit",compact("data"));
    }

    public function update($id,Request $request)
    {
        return $this->categoryRepository->update($id,$request);
    }

    public function show()
    {
        //
    }

    public function destroy($id)
    {
        return $this->categoryRepository->delete($id);
    }


}