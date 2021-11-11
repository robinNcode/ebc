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
    protected $bill = null;

    /**
     * Home constructor.
     */
    public function __construct()
    {
        $this->login = new LoginModel();
        $this->bill = new Bill();
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
//            $user_id = $this->login->checkUser($user, $password);
//            if(!empty($user_id)){
//                session()->set(['user_id' => $user_id]);
//                return redirect()->to('bill/new');
//            }

            if($user == 'admin_anoy' && $password == 'admin'){
                return redirect()->to('dashboard');
            }
            else return redirect()->back();
        }
    }

    public function dashboard()
    {
        $previous_month =  date('m-Y', strtotime(date('m-Y')." -1 month"));

        $users = $this->bill->getUser();
        $previous_units = $this->bill->getUnit($previous_month);
        $present_units = $this->bill->getUser(date('m-Y'));
        $bills = $this->bill->getBill(date('m-Y'));
        d($users, $previous_units, $present_units, $bills);

        $informations = array_merge($users, $previous_units, $present_units);

        dd($informations);

        return view('Views/Home/Dashboard');
    }

}
