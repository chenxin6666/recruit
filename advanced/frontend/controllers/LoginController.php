<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Admin;
header("Content/type:text/html;charset=utf-8");
class LoginController extends Controller
{
    public $enableCsrfValidation = false; //禁止表单提交

    public function actionIndex(){
      return $this->render('login.html');
    }
    public function actionDologin(){
      //接值
      $res = \Yii::$app->request;
      $db  = \Yii::$app->db;
      $username = $res->post('username');
      $pwd      = $res->post('pwd');
      // echo $username;
      // echo $pwd;
      // die;
      $userObj = new Admin;
      $arr = Admin::find();
      $str = $arr->select("id")
                ->from('admin')
                ->where(['username'=>"$username"])
                ->asArray()
                ->all();
      if(!$str){
          die("Sorry, user name does not exist");
      }else{
        $res = $arr->select("id")
                ->from('admin')
                ->where(['username'=>"$username",'pwd'=>"$pwd"])
                ->asArray()
                ->all();
        $re = implode(array_column($res,'id'));
        // echo $re;die;
        // print_r($re);die;
        if($re){
            $session = \YII::$app->session;
            $session->open();
            $session->set('username',$username);
            $session->set('admin_id',$re);
            
            $this->redirect('?r=index/index');
        }else{
          die('Account or password error');
        }
      }
    }
    public function actionShow(){
         $test=new Test();   //实例化model模型
         $arr=$test->find();
         $pages = new Pagination([
         //'totalCount' => $countQuery->count(),
         'totalCount' => $arr->count(),
         'pageSize'   => 3   //每页显示条数
         ]);
          $str=$arr->select('*')
          ->from('new')
          ->offset($pages->offset)
          ->limit($pages->limit)
          ->orderBy(['id'=>SORT_DESC])
          ->asArray()
          ->all();
    
        return $this->render('index',['str'=>$str,'pages'=>$pages]);
    }

    public function actionInsert(){
        $res = \Yii::$app->request;
        $db = \Yii::$app->db;
        $name =  $res->post('name');
        $content = $res->post('content');
        $id = $db->createCommand()
        ->insert('new',['name'=>"$name",'content'=>"$content"])
        ->execute();
        if($id){
            $res = $db->createCommand("select * from new order by id desc limit 1")->queryAll();
            $result = $res[0]['id'];
            echo $result;
        }else{
            echo 0;
        }
    }

    public function actionDel(){
        $yii = \YII::$app->request;
        $id = $yii->get('id');
        $db = \Yii::$app->db;
        $res = $db->createCommand()->delete('new','id=:id',array(':id'=>$id))->execute();
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>