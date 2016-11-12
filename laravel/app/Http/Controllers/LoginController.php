<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Message;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login/login');
    }

    public function Dologin()
    {
        $loginObj = new User();

        $email = Input::get('email');
        $pwd = Input::get('pwd');

        $info = DB::table('user')->select('email',$email and 'pwd',$pwd)->get()->toArray();

        print_r($info);
    }
}
?>
