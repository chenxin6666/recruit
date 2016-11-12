<?php


namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class LyController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInto()
    {
        $a = '1411phpA';
        return $this->render('one', $a);
    }

    public function actionInsert()
    {
        $a = '1409phpD';
        return $this->render('insert', $a);
        //return $this->redirect('?r=index/list')
    }
    public function set(){
        return $this->render('list');
    }
}
?>