<?php
/**
 *
 * User: Murad Shukurlu
 * Date: 1/26/2019
 * Time: 8:38 PM
 */

namespace Blogable\Repository;


use Blogable\Boot\Config;
use Blogable\Models\Menus;
use Blogable\Repository\Interfaces\PerformInterface;

class MenusRepository implements PerformInterface
{

    protected  $menus,$config;

    public function __construct(Menus $menus,Config $config)
    {
        $this->menus = $menus;

        $this->config = $config;
    }


    public function getAll()
    {
        return $this->menus->all();
    }

    public function getBy($key, $value)
    {
        return $this->menus->with("sub_menus")->where($key,$value);
    }

    public function getAllBy($key, $value)
    {
        return $this->menus->with("sub_menus")->where($key,$value)->get();
    }

    public function getAllItems($menu_slug)
    {
        return $this->getAllBy("menu_slug",$menu_slug);
    }

    public function getById($id)
    {
        return $this->menus->find($id);
    }

    public function menus()
    {

      $menuItems = [];

      foreach ($this->config->get()->menus as $item)
      {
           $menuItems[$item->slug] = $this->getBy("menu_slug",$item->slug)->where(function($query)
           {
                $query->where("parent_id",0)->orWhereNull("parent_id");
           })->get();
      }

      return (object)$menuItems;

    }

    public function create($slug,$request)
    {

        $request->validate(['name'=>"required","url_type"=>"in:0,1"
            ,"url"=>'required_if:type,==,0',"blog_id"=>'required_if:type,==,1',]);

        if($request->input('type'))
        {
            $request->merge(array("url_type"=>3)); //
        }

        $create =  array_merge($request->only(['name','url','menu_slug','parent_id','blog_id','url_type']),['order'=>$this->menus::max('order')]);

        $this->menus->create($create);

      return  redirect()->route("backend.menus.items.index",['slug'=>$slug])->withInfo("Okay");

    }

    public function update($id,$slug,$request)
    {
        $request->validate(['name'=>"required","url_type"=>"in:0,1",
           "url"=>'required_if:type,==,0',"blog_id"=>'required_if:type,==,1',]);

        if($request->has('type') && $request->input('url_type')==0  )
        {
            $request->merge(array("url_type"=>3)); //
        }

        $update =  array_merge($request->only(['name','url','menu_slug','parent_id','blog_id','url_type']),['order'=>$this->menus::max('order')]);

        $this->menus->find($id)->update($update);

        return redirect()->back()->withInfo("Updated Successfully");
    }

    public function delete($id)
    {

        //dd($id);
     //  dd($this->menus->find(5)->delete);
        $this->menus->find($id)->delete();

        return redirect()->back()->withInfo("Deleted Successfully");
    }

    public function  search($q)
    {
        return $this->menus->where("name","like",'%'.$q.'%')->get();
    }
}