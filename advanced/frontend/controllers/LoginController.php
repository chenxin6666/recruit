<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Admin;
use app\session;
use yii\common\commonController;
header("content-type:text/html;charset=utf-8");
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
      $pwd      = md5($res->post('pwd'));
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
            //查询管理权限
            $date=\yii::$app->db->createCommand("select * from admin where id='$re'")->queryAll();
            //var_dump($date);die;
            $r_id=$date[0]['r_id'];
            //echo $r_id;die;
            $name=\yii::$app->controller->id;
            //获取当前控制器名字
           yii::$app->session->set('controller',$name);
            $action=yii::$app->controller->action->id;
            //获取当前方法名
            yii::$app->session->set('action',$action);
            $access_list=$this->get_access($r_id);
            yii::$app->session->set('access',$access_list);
            //var_dump(yii::$app->session->get('access')) ;die;
            $this->redirect('?r=index/index');
        }else{
          die('Account or password error');
        }
      }
    }
    /*
     * 查询管理员权限   李阳：
     * int  $re= session_id=id
     */
    public function get_access($r_id){

        $sql="select * from rid_nid as a INNER JOIN node as b on a.n_id=b.n_id where r_id='$r_id'";
        return $access_list=\yii::$app->db->createCommand($sql)->queryAll();

        //var_dump($data);die;
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