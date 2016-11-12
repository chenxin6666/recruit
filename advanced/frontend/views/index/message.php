<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="?r=index/message_pro" method="post">
    <table>
        <tr>
            <td><textarea name="content"></textarea></td>
        </tr>
        <?php foreach($data as $k=>$v)
        {
        ?>
        <tr>
            <td><input type="checkbox" name="s_id" value="<?php echo $v['u_id']?>"><?php echo $v['username']?></td>
        </tr>
        <?php }?>


        <tr>
            <td><input type="submit" value="点击发送"></td>
        </tr>
    </table>
</form>

</body
</html>
</body>
</html>