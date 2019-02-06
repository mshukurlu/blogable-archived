<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 2/4/2019
 * Time: 9:51 AM
 */

namespace Blogable\Http\Controllers\Backend;


use Blogable\Repository\OptionsRepository;
use Illuminate\Http\Request;

class OptionsController
{
        protected  $options;

        public function __construct(OptionsRepository $options)
        {
            $this->options = $options;
        }

        public function index(Request $request)
        {
            $data = $request->has('q') ? $this->options->search($request->input('q')) : $this->options->getAll();

            return view("blogable::backend.options.index",compact("data"));
        }

        public function create()
        {
            return view("blogable::backend.options.create");
        }

        public function store(Request $request)
        {
            return $this->options->create($request);
        }

        public function  edit($id)
        {
            $data = $this->options->getById($id);

            return view("blogable::backend.options.edit",compact("data"));
        }

        public function update($id,Request $request)
        {
            return $this->options->update($id,$request);
        }

        public function destroy($id)
        {
            return $this->options->delete($id);
        }
}