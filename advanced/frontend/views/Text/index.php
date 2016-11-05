<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<script src="style/jq.js"></script>
<center>
	<h1>留言板</h1>
	<div class="table">
		<form action="javascript:void(0)">
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="title" id="title"></td>
			</tr>
			<tr>
				<td>内容</td>
				<td><textarea name="content" id="content" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="button" value="提交" id="sub"></td>
			</tr>
		</table>
		</form>
	</div>
	<form action="">
		<table>
			<tr align="center" id="tab">
				<td>姓名</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach ($str as $val) {?>
			<tr align="center" nae="<?php echo $val['id']; ?>">
				<td><?php echo $val['title']; ?></td>
				<td><?php echo $val['content']; ?></td>
				<td><input type="button" value="删除" id="del"></td>
			</tr>
			<?php } ?>
		</table>
	</form>
</center>
</body>
</html>
<script>
	$(function(){
		//清空文本框内的内容
		$('#title').val(null);
		$('#content').val(null);

		//添加后追加文本框
		$('#sub').click(function(){
			var title = $('#title').val();
			var content = $('#content').val();
			$.ajax({
   			type: "POST",
   			url: "?r=text/insert",
   			data: {title:title,content:content},
   				success: function(msg){
     			if (msg==0) {
     				alert('添加失败');
     			}else{
     				location.reload();
     				alert('添加成功');
     				$('#title').val(null);
					$('#content').val(null);
     			}
   				}
			});
		});

		//ajax删除
		$(document).on('click','#del',function(){
			var _this = $(this);
			var id = _this.parent().parent().attr("nae");
			//获取当前数据行的ID
			//alert(id);
			$.get('?r=text/del',{'id':id},function(msg){
				if (msg) {
					alert('删除成功');
					location.reload()
					//_this.parent().parent().remove();
				}else{
					alert('删除失败');
				}
			});
		})



	//加载事件结束	
	})
</script>