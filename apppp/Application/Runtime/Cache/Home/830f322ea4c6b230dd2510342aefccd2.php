<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/apppp/Common/css/public.css" />
	<script src="/apppp/Common/js/jquery/jquery-1.9.0.min.js"></script>
	<script src="/apppp/Common/js/jquery/jquery.js"></script>
	<script src="/apppp/Common/js/jquery/jquery.form.js"></script>
	<script src="/apppp/Common/js/myscript/public.js"></script>
</head>
<script type="text/javascript">
$(function(){


	$('#changePassword').ajaxForm({
        success:       changePasswordSuccess,
        dataType: 'json'
    });
	
	function changePasswordSuccess(data){
		$("#newcat1").val("");
		$("#newcat2").val("");
		$("#newcat3").val("");
		if(data.status == 1) {
			$(".mask").hide();
			$(".popup_setpwd").hide();
		} else {
			alert(data.msg);
		}
    }
	
	//修改密码
	$(".popup_setpwd .btn_ok").click(function(){
		if($("#newcat1").val() == "") {
			alert("请输入密码");
			return;
		}
		if($("#newcat2").val() == "") {
			alert("请输入新密码");
			return;
		}
		if($("#newcat3").val() == "") {
			alert("请输入确认新密码");
			return;
		}
		if($("#newcat2").val() != $("#newcat3").val()) {
			alert("2次密码不一致，请确认");
			return;
		}
		$("#changePassword").submit();
		//addFloorForm.submit();
		
	});
	
	
	
	//添加公司
	$('#addDept').ajaxForm({
        success:       addDeptSuccess,
        dataType: 'json'
    });
	
	function addDeptSuccess(data){
		if(data.status == 1) {
			$(".mask").hide();
			$(".popup_company").hide();
		} else {
			alert(data.msg);
		}
    }
	
	//
	$(".popup_company .btn_ok").click(function(){
		if($("#deptName").val() == "") {
			alert("请输入公司名称");
			return;
		}
		$("#addDept").submit();
		//addFloorForm.submit();
	});
});

	function showUser(uid) {
		var url = "<?php echo U('User/readUser');?>";
		var realUrl = url.replace(/readUser/,"readUser/uid/"+uid);
		
		var imageFrame = document.getElementById("userFrame");
		imageFrame.src=realUrl;
		//opennewwin(realUrl,'show');
	}
	function addUser() {
		var url = "<?php echo U('User/readUser');?>";
		var imageFrame = document.getElementById("userFrame");
		imageFrame.src=url;
	}
	function refreshUserList(userTree) {
		var tree = document.getElementById("tree");
        tree.innerHTML=userTree;
	}
</script>
<body>
	<div class="main">
		<div class="main_left">
			<div class="logo"></div>
			<div id="tree" class="user_list">
				<?php echo ($userTree); ?>
			</div>
			<div class="add_user"><a href="###" onclick="addUser()">Add User</a></div>
			<div class="add_company"><a href="###">Add your company</a></div>
		</div>
		<div class="main_right">
		<div class="top">
			<h2>Edit User</h2>
			<ul class="clearfix">
				<li><a href="<?php echo U('Image/listImage');?>">Picture list</a></li>
				<li>|</li>
				<li><a class="set_pwd" href="###">CChange Password</a></li>
				<li>|</li>
				<li><a class="exit" href="<?php echo U('Public/logout');?>">drop out</a></li>
			</ul>
		</div>
		<iframe id="userFrame"  src="" width="776" height="685" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
		<div class="mask"></div>
		<div class="popup_prompt">
			<div class="popup_prompt_tit">Confirmation</div>
			<div class="popup_prompt_main">
				<p>xxxxxxxx</p>
				<div class="popup_prompt_btn">
					<input class="btn_cancel" type="submit" value="取消" />
					<input class="btn_delete" type="submit" value="确定" />
				</div>
			</div>
		</div>

	</div>
		

		<div class="mask"></div>
		
		<form id="addDept" method="post" action="/apppp/index.php/Home/User/addDept">
		<div class="popup_company">
			<div class="popup_company_tit">Add your company</div>
			<div class="popup_company_main">
				<p><span>Company Name:</span><input type="text" id="deptName" name="deptName" /></p>
				<div class="popup_company_btn">
				<input class="btn_cancel" type="button" value="取消" />
				<input class="btn_ok" type="button" value="确定" />
			</div>
			</div>
		</div>
		</form>
		
		<form id="changePassword" method="post" action="<?php echo U('Public/changePassword');?>">
		<div class="popup_setpwd">
			<div class="popup_setpwd_tit">change Password</div>
			<div class="popup_setpwd_main">
				<div class="popup_setpwd_item"><span>Old Password:</span><input id="newcat1" name="oldpwd" type="password" /></div>
				<div class="popup_setpwd_item"><span>New Password:</span><input id="newcat2" name="newpwd1" type="password" /></div>
				<div class="popup_setpwd_item"><span>Confirm the new password:</span><input id="newcat3" name="newpwd2" type="password" /></div>
				<div class="popup_setpwd_btn">
					<input class="btn_cancel" type="button" value="取消" />
					<input class="btn_ok" type="button" value="确定" />
				</div>
			</div>
		</div>
		</form>
	</div>
	
</body>
</html>