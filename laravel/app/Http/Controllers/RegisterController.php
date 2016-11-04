<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Message;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register/register');
    }

    //注册
   /* public function register_add()
    {
        $resObj = new User();
        $resObj->
    }*/
}
?>
