<?php

namespace App\Controllers;

/**
 * Class Home
 * @package App\Controllers
 */
class Home extends BaseController
{
    public function index()
    {
        return view('Views/Auth/Login');
    }

    public function loginAttempt()
    {
        dd($this->request->getPost());
    }

    public function create()
    {
        return view('Views/dashboard');
    }

}
