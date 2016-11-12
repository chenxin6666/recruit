
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<center>

    <table border="1">
        <tr>
            <td>名字</td>
            <td>操作</td>
        </tr>
        <?php
        foreach($data as $k=>$v)
        {?>
        <tr>
            <td><?php echo $v['username']?></td>
            <td><button  class="fun" name="<?php echo $v['u_id']?>">添加好友</button></td>
        </tr>
        <?php }?>
    </table>

    </center>
</body>
</html>
<script src="jquery.js">

    </script>
<script>
$('.fun').click(function(){
    var id=$(this).attr('name')
    var url="?r=index/friend_pro"
    $.get(url,{id:id},function(e){
        alert("请求已发送")
    })

})
</script>


