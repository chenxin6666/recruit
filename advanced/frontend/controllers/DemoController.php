<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use app\models\Test;
class DemoController extends Controller
{
    public function actionInsert(){
        $res = \Yii::$app->request;
        $db = \Yii::$app->db;
        $title =  $res->post('title');
        $content = $res->post('content');
        $id = $db->createCommand()
            ->insert('new',['title'=>"$title",'content'=>"$content"])
            ->execute();
        if($id){
            $res = $db->createCommand("select * from new order by id desc limit 1")->queryAll();
            $result = $res[0]['id'];
            echo $result;
        }else{
            echo 0;
        }
    }
    public function actionShow(){
        $test=new Test();   //实例化model模型
        $arr=$test->find();
        $pages = new Pagination([
            'totalCount' => $arr->count(),
            'pageSize'   => 3   //每页显示条数
        ]);
        $str=$arr->select('*')->from('new')->offset($pages->offset)->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->asArray()->all();
        return $this->render('demo',['str'=>$str,'pages'=>$pages]);
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