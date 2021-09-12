<?php

namespace App\Controllers;

use App\Models\LoginModel;

/**
 * Class Home
 * @package App\Controllers
 */
class Home extends BaseController
{
    protected $login = null;

    /**
     * Home constructor.
     */
    public function __construct()
    {
        $this->login = new LoginModel();
    }

    public function index()
    {
        return view('Views/Auth/Login');
    }

    public function loginAttempt()
    {
        $user = $this->request->getPost('user_name', FILTER_SANITIZE_STRING);
        $password = $this->request->getPost('password', FILTER_SANITIZE_STRING);

        if(!empty($user) && !empty($password)){

        }
    }

    public function create()
    {
        return view('Views/dashboard');
    }

}
