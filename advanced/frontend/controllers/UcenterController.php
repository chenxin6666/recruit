<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Admin;

header("Content-type:text/html;charset=utf-8");
/**
 * 用户中心  ucenter控制器的类
 */
class UcenterController extends Controller
{
    public $layout = "common";
    public $enableCsrfValidation = false; //禁止表单提交
    /**
     * 展示用户中心的页面
     */
    public function actionIndex()
    {
        //获取session里的 id  根据id查询该用户的推广链接的浏览量
        $session = \YII::$app->session;
        $username = $session->get("username");
        $id = $session->get("admin_id");
        $id = base64_encode($id); //id用base64加密
        // echo $username;
        // echo $id;die;
        $userObj = new Admin;
        $arr = Admin::find();
        $click_nums = $arr->select("click_num")
                  ->from('admin')
                  ->where(['username'=>"$username"])
                  ->asArray()
                  ->all();

        $pro_link =$_SERVER['SERVER_NAME']."/?r=ucenter/click&id=".$id; //生成推广链接 
        // echo $pro_link;die;
        $click_num = implode(array_column($click_nums,'click_num'));

        return $this->render('index.html',['name'=>$username,'id'=>$id,'pro_link'=>$pro_link,'click_num'=>$click_num]);
    }

    /**
     * 点击链接增加访问量  
     */
    public function actionClick(){
        //接id
        $id = \Yii::$app->request->get('id');
        //判断如果是直接传的id没有经过base_64加密处理的  直接die掉
        if(base64_decode($id)==""){
          die("<script>alert('非法访问')</script>");
        }else{
          $id = base64_decode($id);//解密
        }

          
        // echo $id;die;
        //获取缓存组件
        $cache = \Yii::$app->cache;
        
        //读缓存
        $data = $cache->get($id);
        // print_r($data);die;
        // 如果没有缓存  访问量加1
        if(!$data){
          //往缓存中写数据
          $ip = $_SERVER["REMOTE_ADDR"].'.123'; //获取本地ip（加上.123后缀使之唯一）
          $value = $ip;
          $key = $id;
          $cache->add($id,$value);
          //修改访问量（+1）
          $userObj = new Admin;//实例化数据模型
          $res = \Yii::$app->db->createCommand("UPDATE admin SET click_num=click_num+1 WHERE id='$id'")->execute();
          if($res){//如果修改成功  跳转到用户中心首页
            $this->redirect('?r=ucenter/index');
          }
          
        }else{//直接跳转到用户中心首页
            /**
             * 如果有缓存  重新获取用户ip 与缓存里存的ip进行比较  如果两个值相等 不加访问量
             */
            $ip = $_SERVER["REMOTE_ADDR"];
            //如果不行等  访问量+1  生成缓存
            if($ip!=$data){
                // echo $ip;die;
                $cache->set($id,$ip);
                $userObj = new Admin;//实例化数据模型
                $res = \Yii::$app->db->createCommand("UPDATE admin SET click_num=click_num+1 WHERE id='$id'")->execute();
                if($res){//如果修改成功  跳转到用户中心首页
                  // $this->redirect('?r=ucenter/index');
                  echo "<script>alert('恭喜您访问量+1');location.href='?r=ucenter/index'</script>";
                }
            }else{
                echo "<script>alert('已经增加了访问量');location.href='?r=ucenter/index'</script>";
            }

         
        }

    }

   
}
?>
