<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\wamp\apache2\htdocs\project\tp5\public/../application/index\view\index\testpath.html";i:1487844892;}*/ ?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div>TODO write content</div>
        
        
        <!--虚拟主机用法, 需要虚拟主机的路径指到 public-->
	<img src="/static/img/10.jpg" />
        <!--	相对的 ../../../public/static/123/1.jpg-->
	<img src="__PUBLIC__/img/10.jpg" />
	<!--动态的相对路径-->
	<img src="<?php echo $imgurl; ?>" />
        
    </body>
</html>
