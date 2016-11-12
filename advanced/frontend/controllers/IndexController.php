<?php

namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\ErrorException;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
header("content-type:text/html;charset=utf-8");
class IndexController extends Controller
{
//非法登陆
//定义构造方法，传参登录人ID
//function __construct($id,$models=null){
//    parent::construct($id,$models);
//    $sid=yii::$app->session->get('username');//从session中获取ID
//    if(!$sid){
//        return $this->redirect('?r=index/login');
//    }l
//}
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $session = yii::$app->session;
        $name = $session->get('name');
        $u_id = $session->get('u_id');
        $db = yii::$app->db;
        //通过登陆页面存取的session查询班级表，查询所属班级
        $u_id = $session->get('u_id');
        //echo $u_id;
        //查询班级表
        $data = $db->createCommand("select * from class where u_id='$u_id'")->queryAll();
        // var_dump($data);
//       foreach($data as $k=>$v){
//           var_dump($v['c_name']);
//        }
        return $this->render('list', ['data' => $data]);
        //$data = $db->createCommand("select * from classzk1 left join c_lzk1 on classzk1.c_id=c_lzk1.cid where lid='$l_id' ")->queryAll();
    }

    public function actionInto()
    {
        $db = \yii::$app->request;
        //接受班级ID
        $id = $db->get('id');
        //通过班级ID查询出班级人数
        $data = \yii::$app->db->createCommand("select * from content where c_id='$id'")->queryAll();
        //var_dump($data);die;
        return $this->render('content', ['data' => $data]);

    }

    public function actionSend()
    {
        $db = \yii::$app->request;
        $id = $db->get('id');
        return $this->render('send');
    }

    public function actionSends()
    {

        $session = \yii::$app->session;
        $id = $session->get('u_id');
        $db = \yii::$app->request;
        $data = $db->post();
        //var_dump($data);die;
        $upload = new UploadedFile(); //实例化上传类
        $name = $upload->getInstanceByName('file'); //获取文件原名称
        $img = $_FILES['file']; //获取上传文件参数
        $upload->tempName = $img['tmp_name']; //设置上传的文件的临时名称
        $img_path = '../uploads/' . $name; //设置上传文件的路径名称(这里的数据进行入库)
        $arr = $upload->saveAs($img_path); //保存文件
        $data['c_id'] = $id;
        $data['file'] = $img_path;
        $a = \Yii::$app->db->createCommand()->insert('send', $data)->execute();
        if ($a) {
            echo "发表成功";
            $ab = $db->createCommand("select * from c_id='$id'")->queryAll();
            var_dump($ab);
            die;
            return $this->render('select');
        } else {
            echo 2;
        }
    }

    /*
     * 点击 按钮选择给成员发送消息
     */
    public function  actionMessage()
    {
       $id=\yii::$app->session->get('u_id');//通过登录人session查询出其他人
        $data = \yii::$app->db->createCommand("select * from user where u_id!='$id'")->queryAll();
        return $this->render('message', ['data' => $data]);
    }

    /*
     * 接受消息并且入库
     */
    public function actionMessage_pro()
    {
        $u_id = \yii::$app->session->get('u_id');//发送人的ID
        $data =\yii::$app->request->post();//接受数据
        $s_id=$data['s_id'];//接收人的ID
        $date=array();
        $date['u_id']=$u_id;
        $date['s_id']=$s_id;
        $today = date("Y-m-d H:i:s");
        $date['data']=$today;
        // echo $s_id;die;
        //var_dump($data);die;
        //$aa = \yii::$app->request->db->createCommand("select * from user where u_id='$id'")->queryAll();
       // $data['username'] = $aa[0]['username'];
        unset($data['s_id']);
        $d = \yii::$app->db->createCommand()->insert('message', $data)->execute();
        if($d){
            unset($date['data']);
            \yii::$app->db->createCommand()->insert('id_id',$date)->execute();
            if ($d) {
                echo("发送成功");
            }
        }

    }

    /*
     * 点击进入我的收件箱
     */
    public function actionReceive()
    {//s_id==收件人  u_id=发件人
        if( $where=Yii::$app->request->get()){
        $s_id = \yii::$app->session->get('u_id');//登录人的ID  $id
        //通过派生表查询出信息  发送人的ID 取出来放到USER表查询名字
        $sql="select * from  message  join  id_id  on message.m_id=id_id.m_id join user  on id_id.u_id=user.u_id WHERE s_id='$s_id'";
        $data=\yii::$app->db->createCommand($sql)->queryALL();

        return $this->render('inbox', ['data' => $data]);
        //接受要搜索的条件

        $query=new \yii\db\Query();

        $query->from('message');
        /*
         * 接到条件之后查询
         */
        if(!empty($where['search'])){
            $query->andwhere(['search'=>$where['search']]);
        }
        if(isset($where['searchs'])&& $where['searchs']!==''){
            $query->andWhere(['>=','searchs',$where['data']]);
        }


        return $this->render('inbox',['users'=>$users,'where'=>$where,'data'=>$data]);
    }else{
            $s_id = \yii::$app->session->get('u_id');//登录人的ID  $id
            //通过派生表查询出信息  发送人的ID 取出来放到USER表查询名字
            $sql="select * from  message  join  id_id  on message.m_id=id_id.m_id join user  on id_id.u_id=user.u_id ";
            $data=\yii::$app->db->createCommand($sql)->queryALL();

            return $this->render('inbox', ['data' => $data]);
    }

    }


    /*
     * 删除数据库的数据
     */
    public function actionDelete()
    {
        $id = \yii::$app->request->get('id');
        //echo $id;die;
        $a=\yii::$app->db->createCommand("delete from message where m_id='$id'")->execute();
        if($a){
            $id = \yii::$app->session->get('u_id');//登录人的ID  $id

            $data = \yii::$app->db->createCommand("select * from message where u_id='$id'")->queryALL();
            return $this->render('inbox', ['data' => $data]);
            }
    }

    /*
     * 点击学生列表展示可添加的学生
     */
    public function  actionFriend(){
        $s_id = \yii::$app->session->get('u_id');//获取登录人的ID
        $data=\yii::$app->db->createCommand("select * from user where u_id!='$s_id'")->queryAll();

        return $this->render('friend',['data'=>$data]);
    }
    /*
     * 接受要添加人的请求ID，添加好友
     */
    public function  actionFriend_pro(){
        //s_id==收件人  u_id=发件人
        $id=\yii::$app->request->get('id');
        $u_id=\yii::$app->session->get('u_id');
        $data=array();
        $data['u_id']=$u_id;

        $a=\yii::$app->db->createCommand()->insert('friend',$data)->execute();
        if($a){


        }
    }
/*
 *点击发送人的名字弹出发送人发出的消息
 */
public function actionSelect(){
    //$m_id=yii::$app->request->get('id');
    $a=5;
    $username=yii::$app->request->get('username');
    $data=yii::$app->db->createCommand("select * from message where u_id='$a'")->queryAll();
    $data[0]['username']=$username;
    $data[1]['username']=$username;


    return $this->render('data',['data'=>$data]);
}
}




?>