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
//    'clogin/:loginid/:password'=>'api/user/login',
//    
//    
//    
//    'clogin1/:loginid/:password'=>'api1/user/login',
//    'orders1/:token/:userid'=>'api1/order/orderlist',
//    'shops1/:page/[:kw]/[:orderflag]'=>'api1/shop/shoplist',
    
    //资源路由定义
    '__rest__'=>[
        // 指向api1模块的Rider控制器
        'rider'=>'api1/Rider',
     ],
    
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
