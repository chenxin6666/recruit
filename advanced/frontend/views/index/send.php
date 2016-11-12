<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <form  action="?r=index/sends"method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>新闻标题</td>
            <td><input type="text" name="header"></td>
        </tr>
         <tr>
            <td>内容</td>
            <td><textarea name="content"></textarea></td>
        </tr>
        <tr>
            <td>图片</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>