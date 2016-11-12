<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;//1
use frontend\models\PasswordResetRequestForm;//1
use frontend\models\ResetPasswordForm;//1
use frontend\models\SignupForm;//1
use frontend\models\ContactForm;//1
use yii\base\InvalidParamException;//1
use yii\web\BadRequestHttpException;//1
use yii\web\Controller;//1
use yii\filters\VerbFilter;//1
use yii\filters\AccessControl;//4
use app\models\One;
use yii\data\Pagination;

 class LiyangController extends Controller
{
    public function actionList()
    {
        $test = new One();    //实例化model模型
        $arr = $test->find();
        //$countQuery = clone $arr;
        $pages = new Pagination([
                    //'totalCount' => $countQuery->count(),
            'totalCount' => $arr->count(),
            'pageSize' => 2   //每页显示条数
        ]);
        $models = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('list', [
            'models' => $models,
            'pages' => $pages
        ]);
    }
}
?>
