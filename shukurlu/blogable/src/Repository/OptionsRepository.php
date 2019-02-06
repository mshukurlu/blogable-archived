<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 2/3/2019
 * Time: 1:03 PM
 */

namespace Blogable\Repository;


use Blogable\Models\Options;
use Blogable\Repository\Interfaces\PerformInterface;

class OptionsRepository implements PerformInterface
{
    protected  $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->options->get();
    }

    public function getBy($key, $value)
    {
        // TODO: Implement getBy() method.

        return $this->options->where($key,$value);
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.

        return $this->options->find($id);
    }

    public function getOptions()
    {
        //
    }

    public function create($request)
    {
        $request->validate(["option_name"=>"required","option_value"=>"required"]);

        $this->options->create($request->only(['option_name','option_value']));

        return redirect()->route('backend.options.index');
    }

    public  function update($id,$request)
    {
        $request->validate(["option_name"=>"required","option_value"=>"required"]);

        $this->options->find($id)->update($request->only(['option_name','option_value']));

        return redirect()->route('backend.options.index');
    }

    public  function delete($id)
    {
        $this->options->find($id)->delete();

        return redirect()->route('backend.options.index');
    }

    public function  search($q)
    {
        return $this->options->where("option_name","like",'%'.$q.'%')->get();
    }
    
    public function options()
    {
        $options = [];

        $items = $this->getAll();
        //dd($items[0]->option_name);
        foreach($items as $item)
        {
           // print_r($key["option_name"]);
           // $options[$key] = $value;

          $options[$item->option_name] = $item->option_value;
        }

        return (object)$options;
    }
}