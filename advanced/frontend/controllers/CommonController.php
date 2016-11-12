<?php
/**
 * 职位
 */
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\PosCategory;

header("Content-type:text/html;charset=utf-8");
class CommonController extends Controller
{

    /**
    * 构造方法
    * 接值:$request 数据库:$db 添加cookie:$cookies_add 获取cookie:$cookies_sel 设置session:$session
    * 公共
    */
    public $request;
    public $db;
    public $cookies_ad;
    public $cookies_co;
    public $session;
    public function init()
    {
        parent::init();
        $this->request = \Yii::$app->request;
        $this->db = \Yii::$app->db;
        $this->cookies_ad = Yii::$app->response->cookies;
        $this->cookies_co = Yii::$app->request->cookies;
        $this->session = \Yii::$app->session;
        $this->session->open();
        
        if(empty($this->session->get('admin_id'))){
            echo"<script>alert('请先登录');location.href='?r=login/index'</script>";die();
        }
    }

    
    
   
}