<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php
$form=ActiveForm::begin([
    'action'=>Url::toRoute(['student/index']),
    'method'=>'get',
]);
echo '姓名：',Html::input('text','name');
echo '年龄:',Html::input('text','age1');
echo '-',Html::input('text','age2');
echo Html::submitButton('查询');
ActiveForm::end();
?>
<table class="table">
    <?php foreach($users as $user):?>
    <tr>
        <td><?php echo"姓名" ?></td>
        <td><?php echo"年龄" ?></td>
    </tr>
    <tr>
        <td><?php echo $user['name'] ?></td>
        <td><?php echo $user['age'] ?></td>
    </tr>
    <tr>

</tr>
    <?php endforeach; ?>