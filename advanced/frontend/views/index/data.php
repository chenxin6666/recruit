<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="">
    <table border="1">
        <tr>
            <td>ID</td>
            <td>发送人</td>
            <td>时间</td>
            <td>内容</td>
        </tr>
        <?php
        foreach($data as $k=>$v){
            ?>
        <tr>
            <td><?php echo $v['m_id'] ?></td>
            <td><?php echo $v['username']?></td>
            <td><?php echo $v['data']?></td>
            <td><?php echo $v['content'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</form>
</body>
</html>