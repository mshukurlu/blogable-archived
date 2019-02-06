<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 2/4/2019
 * Time: 11:23 AM
 */

namespace Blogable\Http\Controllers\Backend;


class DashboardController
{
        public function index()
        {
            return view('blogable::backend.dashboard.index');
        }
}