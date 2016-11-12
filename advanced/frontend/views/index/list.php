<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="get">
    <table>
        <h1>已加入的班级</h1>
        <?php
        foreach($data as $k=>$v){
        ?>

        <tr>
            <input type="hidden" value="<?php echo $v['c_id']?>">
            <td><?php echo $v['c_name']?></td>
            <td><a href="?r=index/into&id=<?php echo $v['c_id']?>"><input type="button" value="点击进入班级空间"></a></td>
        </tr>


<?php }?>
        <center>
        <tr>
            <td><a href="?r=index/friend"><input type="button" value="学生列表"></a></td>
            <td><a href="?r=index/receive"><input type="button" value="我的收件箱"></a></td>
        </tr>
            </center>
    </table>
</form>
</body>
</html>