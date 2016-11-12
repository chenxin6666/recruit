<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php
$form=ActiveForm::begin([
    'action'=>Url::toRoute(['index/receive']),
    'method'=>'get',
]);
echo '开始时间：',Html::input('text','search');
echo '结束时间:',Html::input('text','searchs');
echo Html::submitButton('查询');
ActiveForm::end();
?>
    <table class="table">
        <tr>
            <td><?php echo"ID" ?></td>
            <td><?php echo"时间" ?></td>
            <td><?php echo"发件人" ?></td>
        </tr>
<?php foreach($data as $user):?>

    <tr>
        <td><?php echo $user['m_id'] ?></td>
        <td><?php echo $user['data'] ?></td>
        <td><a href="?r=index/select&username=<?php echo $user['username']?>"><?php echo $user['username']?></a></td>
        <td><a>删除</a></td>
    </tr>

    <?php endforeach; ?>


