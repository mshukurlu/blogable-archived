<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 2/3/2019
 * Time: 12:09 PM
 */

namespace Blogable\Http\Controllers\Backend;


use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function __construct ()
    {

    }

    public function login()
    {
        //for customize your login page
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("backend.auth.login");
    }
}