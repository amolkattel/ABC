<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/apppp/Common/css/public.css" />
	<script src="/apppp/Common/js/jquery/jquery-1.9.0.min.js"></script>
	<script src="/apppp/Common/js/myscript/public.js"></script>
</head>
<body  onload='showMsg("<?php echo ($msg); ?>")' style="background: url(/apppp/Common/images/login.png) center repeat;">

	<form action="<?php echo U('login');?>" method="post">
	<div class="logo_main">
		<input class="user" type="text" name="name" placeholder="Account Name"/>
		<input class="pwd" type="password" name="pwd" placeholder="Password"/>
		<input class="login_btn" type="submit" />
	</div>
	</form>
</body>
</html>
<script>
function showMsg(msg) {
	if(msg != "") {
		alert(msg);
	}
}
</script>