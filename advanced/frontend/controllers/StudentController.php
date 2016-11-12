<?php
namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
    class StudentController extends Controller{
    public function actionIndex(){

        //return $this->render('index');
        $where=Yii::$app->request->get();
        $query=new \yii\db\Query();
        $query->from('student ');
        if(!empty($where['name'])){
           $query->andwhere(['name'=>$where['name']]);
        }
        if(isset($where['age1'])&& $where['age1']!==''){
            $query->andWhere(['>=','age',$where['age1']]);
        }
        if(isset($where['age2'])&& $where['age2']!==''){
            $query->andWhere(['<=','age',$where['age2']]);
        }

        return $this->render('index',['users'=>$users,'where'=>$where]);
    }

}


?>