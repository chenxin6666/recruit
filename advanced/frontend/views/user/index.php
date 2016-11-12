<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php
$form=ActiveForm::begin([
    'action'=>Url::toRoute(['user/index']),
    'method'=>'get',
]);
echo Html::input('text','title');
echo Html::input('text','content');
echo Html::submitButton('提交');
ActiveForm::end();
?>