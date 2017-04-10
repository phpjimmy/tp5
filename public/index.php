<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
 
$_root  =   rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'],'/')),'/');
//define('APP_ROOT',  (($_root=='/' || $_root=='\\')?'':$_root));
define('APP_ROOT', 'http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']));
//define('APP_ROOT', ''.$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']));

define('__ROOT__', dirname($_SERVER['SCRIPT_NAME']));


// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

// 读取自动生成定义文件
//$build = include '../build.php';
// 运行自动生成
//\think\Build::run($build);
 