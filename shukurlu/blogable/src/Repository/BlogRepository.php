<?php
namespace Blogable\Repository;


use Blogable\Models\Blog;
use Blogable\Repository\Interfaces\PerformInterface;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements  PerformInterface
{


  protected  $blog;

   public function __construct(Blog $blog)
   {
      $this->blog = $blog;
   }

    public function getAll()
    {
        // TODO: Implement getAll() method.
      return  $this->blog->all();
    }

    public function getBySlug($slug)
    {
        return $this->getBy("slug",$slug)->first();
    }

    public function getBy($key,$value)
    {
        // TODO: Implement getById() method.

        return $this->blog->where($key,$value);
    }

    public function getById($id)
    {
        return $this->blog->find($id);
    }

    public function  where($key,$operator,$value)
    {
        return $this->blog->where($key,$operator,$value);
    }

    public function getRepo()
    {
        return $this->blog;
    }
        //searching
    public function search_blogable($keyword)
    {
        return $this->blog->where("title","like",'%'.$keyword.'%')->orWhere("text","like",'%'.$keyword.'%')->get();
    }
    //getting pages with type
    public function get_pages($type)
    {
        return $this->getBy("type",$type)->get();
    }
    //creating
    public function create($request)
    {
        $request->validate([
            "title"=>"required|min:3",
            "text"=>"required",
            "slug"=>"required|min:3",
            "category_id"=>"required",
            "is_published"=>"required"
        ]);

        $create =  array_merge($request->all(),["user_id"=>Auth::id()]);

        $create = $this->blog->create($create);

        return redirect()->route("backend.posts.edit",['id'=>$create->id])->withInfo("Post created successfully!");
    }

    public function update($id,$request)
    {

        $request->validate([
            "title"=>"required|min:3",
            "text"=>"required",
            "slug"=>"required|min:3",
            "category_id"=>"required",
            "is_published"=>"required"
        ]);

        $this->blog->find($id)->update($request->all());

        return redirect()->back()->withInfo("Post updated successfully!");
    }

    public function delete($id)
    {
         $this->blog->find($id)->delete();

         return redirect()->back()->withInfo("Post deleted");
    }

    public function  search($q)
    {
        return $this->blog->where("title","like",'%'.$q.'%')->get();
    }

}