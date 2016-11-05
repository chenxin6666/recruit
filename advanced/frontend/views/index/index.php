<?php
use yii\widgets\LinkPager;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
</head>
<body>
<center>
    <form action="" method="post">
        <table>
            <tr>
                <td>标题</td>
                <td><input type="text" name="title" id="title"/></td>
            </tr>
            <tr>
                <td>内容</td>
                <td><textarea id="content" name="content" cols="20" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><input type="button" value="提交" id="sub"/></td>
            </tr>
        </table>
    </form>
   <div>
        <table>
            <tr>
                <td>标题</td>
                <td>内容</td>
            </tr>
            <?php foreach($str as $k=>$v){?>
            <tr nae="<?=$v['id'];?>">
                <td><?= $v['title']?></td>
                <td><?= $v['content']?></td>
                <td><input type="button" value="删除" id="del"/></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <?php
        echo LinkPager::widget([
            'pagination'=>$pages,
        ]);
    ?>
</center>
</body>
<script src="js/jq.js"></script>
<script>
$(function(){
    $("#sub").click(function(){
        var title = $('#title').val();
        var content = $('#content').val();

        $.ajax({
            type:'post',
            url:"?r=index/add",
            data:{title:title,content:content},
            success:function(msg){
                if(msg=='no'){
                    alert('失败');
                }else{
                    location.reload();
                    $('#title').val(null);
                    $('#content').val(null);
                }
            }
        })
    });

    $(document).on('click','#del',function(){
        var _this = $(this);
        var id = _this.parent().parent().attr('nae');
        $.get({
            url:"?r=index/del",
            data:{id:id},
            success:function(msg){
                if(msg=='ok'){
                    location.reload();
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
        }
    })
})
})
</script>
</html>
