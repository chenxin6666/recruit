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
class LoginController extends Controller
{
    public $layout = false;     //去掉公共的头部和底部
    public $enableCsrfValidation = false; //禁止表单提交

    /**
     * 显示用户登录的页面
     * @return [type] [description]
     */
    public function actionIndex(){
      //查询出所有的用户类型  循环到注册页面的下拉框中
      // $type = new CustomerType;
      $arr = CustomerType::find();
      $str = $arr->select('*')
                ->from('customer_type')
                ->asArray()
                ->all();
      $type_id = array_column($str,'type_id');
      $type_name = array_column($str,'type_name');
      $type = array_combine($type_id, $type_name);
      // print_r($type);die;
      // echo "你好";die;
      return $this->render('login.html',['type'=>$type]);
    }
    /**
     * 验证登录
     * @param   $[username] 用户名
     * @param   $[pwd] 密码
     * @return [type] [description]
     */
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
        $id= implode(array_column($res,'id'));
        // echo $re;die;
        // print_r($re);die;
        if($id){
            //设置session
            $session = \YII::$app->session;
            $session->open();
            $session->set('admin_name',$username);
            $session->set('admin_id',$id);
            
            $this->redirect('?r=index/index');
        }else{
            die('Account or password error');
        }
      }
    }
    public function actionLogin_out(){
         unset(\Yii::$app->session['adminname']);
         unset(\Yii::$app->session['admin_id']);
         
         $this->redirect('?r=login/index');
    }

   
}

?>