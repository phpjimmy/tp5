<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------
      'url_route_on' => true,
      'url_route_must'=> false,
    
    
     'captcha' => [
        // 验证码字符集合
        'codeSet' => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码字体大小(px)
        'fontSize' => 25,
        // 是否画混淆曲线
        'useCurve' => true,
        // 验证码图片高度
        'imageH' => 30,
        // 验证码图片宽度
        'imageW' => 100,
        // 验证码位数
        'length' => 5,
        // 验证成功后是否重置
        'reset' => true
      ],
    
     //数据库配置1
    'db_config1' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => '127.0.0.1',
        // 数据库名
        'database' => 'O2O_test1',
        // 数据库用户名
        'username' => 'root',
        // 数据库密码
        'password' => '123456',
        // 数据库编码默认采用utf8
        'charset' => 'utf8',
        // 数据库表前缀
        'prefix' => 'w_',
    ],
    
    //数据库配置2
    'db_config2' => 'mysql://root:123456@localhost:3306/O2O_test1#utf8',
    
];
