<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Message;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;
class RegisterController extends Controller
{
    /**
     * 显示注册主页面
     * @return [type] [description]
     */
    public function register()
    {
        return view('register/register');
    }

    /**
     * Display a listing of the resource.
     * 验证码
     *
     * @return Response
     */
    public function captcha($tmp)
    {
                //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    //注册
    public function register_add()
    {
        $resObj = new User();

        $resObj->email = Input::get('email');
        $resObj->email = Input::get('email');
        $resObj->pwd = Input::get('pwd');
        $res = $resObj->save();

        if($res){
            echo 'ok';
        }else{
            echo 'no';
        }
    }
}
?>
