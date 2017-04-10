<?php
namespace app\api1\controller;

class Order extends Base{
    
    public function orderlist($token='',$userid=0) {
	$auth = $this->loginAuth($token, $userid);
	if(!$auth){
	    return $this->response([], 1, '您尚未登录');
	}else{
	    return [1,2,3,4,5];
	}
    }
    
}