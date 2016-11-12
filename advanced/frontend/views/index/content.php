<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form>
    <table>

        <?php
        foreach($data as $k=>$v){
            ?>

        <tr>
            <td>班级共有<?php echo $v['c_num']?>人</td>

        </tr>
        <tr>
            <td><a href="?r=index/send&id=<?php echo $v['id']?>">我要发言</td>

        </tr>
        <tr>
            <td><a href="?r=index/message"><input type="button" value="发送消息"></a></td>
            <td></td>
        </tr>
        <?php }?>
    </table>
</form>
</body>
</html>