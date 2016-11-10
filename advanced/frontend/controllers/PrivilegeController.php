<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Test;
header("content-type:text/html;charset=utf-8");
class PrivilegeController extends Controller{
/*
 * 展示页面
 */
    public $enableCsrfValidation = false; //禁止表单提交
    public $layout = false;
    public function actionIndex(){
        $data=\yii::$app->db->createCommand("select * from role")->queryAll();
        return $this->render('index',['data'=>$data]);
    }
    /*
     * 添加权限
     */
    public function actionAdd(){

        $data=\yii::$app->db->createCommand("select * from role")->queryAll();
       return $this->render("add",['data'=>$data]);
    }
    /*
     * 接受数据入库
     */
    public function actionAdd_pro(){
        $data=\yii::$app->request->post();
        $data['pwd']=md5($data['pwd']);
        $a=\yii::$app->db->createCommand()->insert('admin',$data)->execute();
        if($a){
            echo "<script>alert('添加成功')</script>";
            $data=\yii::$app->db->createCommand("select * from role")->queryAll();
            return $this->render('index',['data'=>$data]);
            //return $this->render('');
        }
    }
}






?>