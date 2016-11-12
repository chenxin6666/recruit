<?php

namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{
    public $enableCsrfValidation = false;
    public function actionLogin(){
        return $this->render('login');
    }
    public function actionLogin_pro(){
        $db=\yii::$app->db;
        $data=\yii::$app->request->post();
        $username=$data['username'];
        $arr=$db->createCommand("select * from user where username='$username'")->queryOne();
        //var_dump($arr);
        //echo $arr['u_id'];
        $u_id=$arr['u_id'];
       $username= $arr['username'];
        $session= Yii::$app->session;
        $session->set('username',$username);
        $session->set('u_id',$u_id);
            echo "登陆成功";
            return $this->redirect('?r=index/index');

       // echo $session->get('username');


    }
}
?>