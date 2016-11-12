<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<center>
<form action="" method="post">
    <table border="1">

            开始时间:
            <input type="text" name="s_id">
            结束时间:
            <input type="text" name="ts_id">
        <td><input type="button" value="查询"></td>
        <tr>
            <td>ID</td>
            <td>内容</td>
            <td>发送人</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $k=>$v){ ?>
        <tr>
            <td><?php echo $v['m_id'] ?></td>
            <td><?php echo $v['content']?></td>
            <td><?php echo $v['username']?></td>
            <td><a href="?r=index/delete&id=<?php echo $v['m_id']?>">删除</a></td>
        </tr>
        <?php }?>
    </table>
</form>
    </center>
</body>

</html>