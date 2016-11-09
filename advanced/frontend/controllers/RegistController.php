<?php
/**
 * 后台用户登录
 */
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Admin;
use app\models\CustomerType;
header("Content-type:text/html;charset=utf-8");
class RegistController extends Controller
{
    public $layout = false;     //去掉公共的头部和底部
    public $enableCsrfValidation = false; //禁止表单提交

    
    /**
     * 验证注册
     * @param   $[username] 用户名
     * @param   $[pwd] 密码
     * @return [type] [description]
     */
    public function actionDoregist(){
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
      $str = $arr->select("id,username")
                ->from('admin')
                ->where(['username'=>"$username"])
                ->asArray()
                ->all();
      $str = implode(array_column($str,'username'));
      // echo $username;
      // echo "<br>";
      // echo $str;
      $re = strcmp($username,$str);
      if($re!=0){
        die("<script>alert('请正确输入用户名');location.href='?r=login/index'</script>");
      }
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
            //设置session
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
    public function actionLogin_out(){
         unset(\Yii::$app->session['username']);
         unset(\Yii::$app->session['admin_id']);
         
         $this->redirect('?r=login/index');
    }

   
}

?>