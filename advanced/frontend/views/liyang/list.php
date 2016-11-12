<?php
use yii\widgets\LinkPager;
?>
<table>
    <tr>
        <td>ID</td>
        <td>名字</td>
        <td>密码</td>
    </tr>
    <?php foreach($models as $k=>$v){ ?>
        <tr>
            <td><?php echo $v['u_id']?></td>
            <td><?php echo $v['username']?></td>
            <td><?php echo $v['pwd']?></td>
        </tr>
    <?php }?>
</table>


<?php  echo LinkPager::widget([
    'pagination' => $pages,
]);
?>


