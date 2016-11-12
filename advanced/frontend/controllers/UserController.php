<?php
namespace frontend\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class UserController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}

?>