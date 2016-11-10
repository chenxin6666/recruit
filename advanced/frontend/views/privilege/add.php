<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<center>
<form action="?r=privilege/add_pro" method="post">
    <table>
        <h1>添加角色权限</h1>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td>Email地址</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>角色</td>
            <td>
                <select name="r_id" id=" <option value=""></option>">
                <option value="">.....请选择该用户角色</option>
                <?php foreach($data as $k=>$v){?>
                    <option value="<?php echo $v['r_id']?>"><?php echo $v['r_name']?></option>
                <?php
                }
                ?>
                </select>
            </td>
        </tr>



        <tr>
            <td><input type="submit" value="添加"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
    </center>
</body>
</html>