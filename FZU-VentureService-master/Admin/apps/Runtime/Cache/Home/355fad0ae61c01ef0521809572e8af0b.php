<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap-datetimepicker.min.css" /><!--日期插件样式-->
	<script src="/demo/jyzd/01/Admin/Public/date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/js/jquery.form.js" charset="UTF-8"></script>

</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/demo/jyzd/01/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
				<p class="old-line">	
					<input type="password" name="old_pwd" placeholder="旧密码" value="" required>
				</p>
				<p class="new-line">
					<input type="password" name="new_pwd" placeholder="新密码" value="" required>
				</p>
				<p class="submit-line">
					<input class="submit" type="submit" value="确认修改">
				</p>
			</form>
		</div>
	</div>
	<!-- Modify End -->

	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/demo/jyzd/01/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name'] != '' ? $user['name'] : "管理员"; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/demo/jyzd/01/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/notice/index">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/user/index">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project/index">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/field/index">基地管理</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class/index">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/document/index">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/competition/index">比赛管理</a></li>
				</ul>
			</div>
<!-- 发布表格 -->
<div class="user-box block">
	<form action="/demo/jyzd/01/Admin/index.php/home/notice/publish/<?php echo ($type); ?>/do" enctype="multipart/form-data" method="post" class="publish-form form-horizontal">
		<h2 align="center" style="margin: 0 0 20px 0; color: #61a3e1;">资讯发布</h2>
	 	<table class="publish-table">
			<tr>
				<td><h4 class="line-title text-right"><span class="star">*</span>发布类型：</h4></td>
				<td>
					<label class="radio-inline"><input type="radio" name="type" value="0" <?php if($type == "index" ) echo "checked='checked'";?> >新闻资讯</label>
					<label class="radio-inline"><input type="radio" name="type" value="1" <?php if($type == "notice" ) echo "checked='checked'";?> >通知公告</label>
					<label class="radio-inline"><input type="radio" name="type" value="2" <?php if($type == "policy" ) echo "checked='checked'";?> >最新政策</label>
				</td>
			</tr>
			<?php if($type == 'index'): ?><tr>
					<td><h4 class="line-title text-right">首页显示：</h4></td>
					<td><label class="checkbox-inline"><input type="checkbox" name="overhead" value="1">热门资讯（需上传图片）</label> <input class="hot-pic" name="photo" type="file" ></td>
				</tr><?php endif; ?>
			<tr>
				<td><h4 class="line-title text-right"><span class="star">*</span>标题：</h4></td>
				<td><input class="title-input form-control" name="theme" type="text"></td>
			</tr>
			<tr>
				<td><h4 class="line-title text-right"><span class="star">*</span>内容：</h4></td>
				<td><script id="_container" name="content" type="text/plain" style="width: 100%; height:300px; margin-left: －10px">
					（这里填写资讯内容）
				</script>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><button class="btn btn-publish">发布</button></td>
			</tr>
	 	</table>
	</form>
</div>

<script type="text/javascript" src="/demo/jyzd/01/Admin/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/demo/jyzd/01/Admin/Public/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
	        var ue = UE.getEditor('_container');
</script>
			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/demo/jyzd/01/Admin/index.php/home/admin/refuse" method="post">
						<p>请填写拒绝理由</p>
						<p class="refuse-hint">拒绝后将通过短信通知</p>
						<input id="module" type="hidden" name="module" value="<?php echo ($MODULE); ?>">
						<input id="receiver" type="hidden" name="receiver" value="">
						<textarea name="message"></textarea>
						<div class="popup-select clearfix">
							<span class="yes pull-left"><input type="submit" name="sub" value="确认"></span>
							<span class="no pull-right">取消</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Admin End -->
	
	<script src="/demo/jyzd/01/Admin/Public/js/admin.js"></script>


	<!-- 日期插件 -->
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap.min.js"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
		$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    	});
    	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd'});
	</script>
</body>
</html>