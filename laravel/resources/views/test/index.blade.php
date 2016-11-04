<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<!-- 引入样式和js -->
	<link rel="stylesheet" href="css/ui-dialog.css">
	<script src="jq/jq.js"></script>
	<script src="js/dialog-min.js"></script>
	<script src="js/template.js"></script>
	<script src="js/template-native.js"></script>
	<style>

	
		ul li {
			text-align:center;
			list-style-type:none;
			float: left;

		}
	</style>
</head>
<body>
<center>
<h3>留言板：</h3>
<button type='button' onclick="send()">留言</button>
	<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>编号</td>
				<td>姓名</td>
				<td>内容</td>
				<td>时间</td>
				<td>操作</td>
			</tr>
			@foreach($info as $v)
		
			<tr>
				<td>{{$v->id or ""}}</td>
				<td>{{$v->name or 'php'}}</td>
				<td>{{$v->content or "最好的语言"}}</td>
				<td>{{$v->time or 000}}</td>
				<td colspan="5">
					<a href="javascript:delMessage({{$v->id}});">删除</a>
					<a href="javascript:modifyMessage({{$v->id}});">修改</a>
				</td>
			</tr>
				
			@endforeach	
			
		</table>

		<div   style="margin-left:550px;">{!! $info->render()!!}</div>
</center>
</body>
</html>
<!-- 添加留言的模板 -->
<script id="test" type="text/html">
	<form name="addData">
		<table >
			<tr>
				<td>姓名：</td>
				<td><input type="text" name="name" value="<%=name%>"></td>
			</tr>
			<tr>
				<td>留言：</td>
				<td><textarea name='content'><%=content%></textarea></td>
			</tr>
			<input type="hidden" name="update_id" value="<%=id%>">
		</table>
	</form>
</script>
<script>
	var test = template('test');
	//点击留言的按钮 调用dialog类 弹出添加留言板的窗口
	function send(){
		dialog({
			title: '留言板', //标题
		    content: test,   //内容
		    okValue: '确定', //确定的按钮
		    ok: function () { 
		    	var formData = $("form[name='addData']").serialize();
		        $.ajax({
		        	url: "<?=URL::action('TestController@addMessage') ?>",
		        	type: 'get',
		        	data: formData,
		        	success:function(msg)
		        	{
		        		if (msg) 
		        		{
		        			alert('留言成功');
		        			window.location.href='<?=URL::action('TestController@index') ?>';
		        		}
		        	}
		        })
		    },
		    cancelValue: '取消', //如果点了取消的按钮 执行一个空方法
		    cancel: function () {}
		}).show();
	}

	//删除
	function delMessage(id){
		var url = "<?=URL::action('TestController@delMessage')?>";
		$.get(url,{id:id},function(msg){
			//alert(msg)
			if(msg=="ok"){
				alert('删除成功');
				window.location.href='<?URL::action('TestController@index')?>';
			}else{
				alert('网络错误。');
			}
		})
	}

	//修改
	function modifyMessage(id){
		$.getJSON("<?=URL::action('TestController@getone');?>",{id:id},function(msg){
			// console.log(msg)
			var updateForm = template('test',msg[0]);
			dialog({
			title: '编辑留言', //标题
		    content: updateForm,   //内容
		    okValue: '确定', //确定的按钮
		    ok: function () { 
		    	var formData = $("form[name='addData']").serialize();
		        $.ajax({
		        	url: "<?=URL::action('TestController@modifyMessage') ?>",
		        	type: 'get',
		        	data: formData,
		        	success:function(msg)
		        	{
		        		// alert(msg)
		        		if (msg) 
		        		{
		        			alert('修改成功');
		        			window.location.href='<?=URL::action('TestController@index') ?>';
		        		}
		        	}
		        })
		    },
		    cancelValue: '取消', //如果点了取消的按钮 执行一个空方法
		    cancel: function () {}
			}).show();
		})
	}



</script>