<?php
namespace app\api1\controller;

class Base{  
       
    //session -> cookie(PHPSESSIONID=jalksdjfkjalasdf) -> session($_SESSION[])
    //错误返回 ->定义公用错误结构
    //鉴权:判断登录(判断token) ->验证 允许访问(token验证通过)->其他
    //登录: 登录完成->返回客户端 ->以后有跟用户相关的接口
    
    //1->自定义验证机制:
          //UAERID_WM_20170116 =>MD5
         // userid =>
    //2 ->通过 ->开启回话 ->得到id
    //3 ->通过 ->userid+date() =>token =>user->token ->loginstate(userid,token)
        
    // 登录的鉴权操作
    public function loginAuth($token='',$userid=0) {
	$res = db('loginstate')->where("userid={$userid} AND token='{$token}'")-> select();
	return $res!=null;
    }
    
    // 登录完成 保存授权信息
    public function loginSuccess($token='',$userid=0) {
	if($userid>0 && strlen($token)>0){
	    $loginstate = db('loginstate');
	    $loginstate->delete(['userid'=>$userid]);
	    $loginstate->insert(['userid'=>$userid,'token'=>$token]);
	}
    }
    
    // 获取返回数据 (参数配置错误码)
    public function response($data=[],$errorCode=0,$errorMsg='') {
	$res['data'] = $data;
	$res['errorCode']=$errorCode;
	// 补充错误码与错误信息对应关系
	if(strlen($errorMsg)<1){
	   $errorMsg = '从配置取出对应的错误信息'.rand(1, 100);
	}
	$res['errorMsg']=$errorMsg;
	return $res;
    }

 
	    
}