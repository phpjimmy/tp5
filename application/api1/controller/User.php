<?php
namespace app\api1\controller;

class User extends Base{
    public function login($loginid='',$password='',$clienttype='2') {
	// 获取 提交的数据 -> param.可以取到(方法列表可以取到) 
	         // -> php:input ->自己解析 
	// 验证器 
	if($clienttype>=0 && $clienttype<=2){
	    $where = ['loginid'=>$loginid,
		    'password'=>$password];
	    $u = db('User');
	    $res = $u->where($where)->select();
	    $uinfo = $res[0];
	    if($uinfo){
		$token = md5($uinfo['u_id'].time());
		$this->loginSuccess($token, $uinfo['u_id']);
		$uinfo['token'] = $token;
		return $this->response($uinfo);
	    }
	}
	return $this->response([],1);
    }
    
    
}