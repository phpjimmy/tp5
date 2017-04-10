<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\wamp\apache2\htdocs\project\tp5\public/../application/index\view\login\index.html";i:1484200030;}*/ ?>
<!DOCTYPE html>

<html>
    <head>
	<title>登录</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      
	<form action="<?php echo url('index/Login/dologin'); ?>">
            <input type='text' name='loginid' placeholder='请输入帐号' /><br>
	    <input type='password' name='password' placeholder='请输入密码' /><br>
	    <input type='text' name='verify' placeholder='请输入验证码' /><br>
            <div><?php echo captcha_img(); ?></div>
            <!--<div><img src="<?php echo captcha_src(); ?>" alt="captcha" /></div>-->
	    <input type='submit' value='登录'/>
	</form>
	
    </body>
</html>
