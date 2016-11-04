<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii;
use yii\data\Pagination;
use app\models\Test;

class IndexController extends Controller
{
    public $enableCsrfValidation = false; //禁止表单提交

    public function actionIndex()
    {
        return $this->render('index.html');
    }

    public function actionAdd()
    {
           $request = Yii::$app->request;
           $db = Yii::$app->db;
           //接值
           $title = $request->post('title');
           $content = $request->post('content');
           //执行添加
           $res = $db->createCommand()->insert('new',['title'=>$title,'content'=>$content])->execute();
           if($res){
               $data = $db->createCommand("select * from new order by id desc limit 1")->queryAll();
               $result = $data[0]['id'];
               echo $result;
           }else{
               echo 'no';
           }
    }

    public function actionShow()
    {
        //实例化模型
        $test = new Test();
        $arr = $test->find();
        $pages = new Pagination([
            'totalCount' => $arr->count(),
            'pageSize'   => 3   //每页显示条数
        ]);
        $str = $arr->select('*')
            ->from('new')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->all();
        return $this->render('index',['str'=>$str,'pages'=>$pages]);
    }

    public function actionDel()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $db = Yii::$app->db;
        $res = $db->createCommand()->delete('new','id=:id',array(':id'=>$id))->execute();
        if($res){
            echo 'ok';
        }else{
            echo 'no';
        }
    }
}
?>
