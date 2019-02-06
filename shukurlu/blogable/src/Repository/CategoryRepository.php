<?php
namespace  Blogable\Repository;

use Blogable\Models\Category;
use Blogable\Repository\Interfaces\PerformInterface;
use Illuminate\Http\Request;

class CategoryRepository implements  PerformInterface
{

    private  $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.

         return   $this->category->all();
    }

    public function getBy($key, $value)
    {
        // TODO: Implement getBy() method.

        return $this->category->with("blogable")->where($key,$value);
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->category->find($id);
    }

    public function getBySlug($slug)
    {
        return $this->getBy('slug',$slug)->firstOrFail();
    }

    public function create(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3",
            "parent_id"=>"required",
            "slug"=>"required|min:3"
        ]);
        
        $this->category->create($request->all());

        return redirect()->back()->withInfo("Category created");
    }

    public function update($id,Request $request)
    {
        $request->validate([
            "name"=>"required|min:3",
            "parent_id"=>"required",
            "slug"=>"required|min:3"
        ]);

        $this->category->find($id)->update($request->all());

        return redirect()->back()->withInfo("Category created");
    }

    public  function  delete($slug,$id)
    {
        $this->category->find($id)->delete();

        return redirect()->back()->withInfo("Category deleted");
    }

    public function  search($q)
    {
        return $this->category->where("name","like",'%'.$q.'%')->get();
    }
}