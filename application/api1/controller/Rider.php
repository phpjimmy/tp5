<?php
namespace app\api1\controller;

class Rider extends Base{
    
    public function index() {
	$list = model('rider')->select();
	return $this->response($list);
    }
    
    public function read($id) {
	$list = model('rider')->where("r_id=$id")->select();
	return $this->response($list);
    }
    
    public function save() {
	return input('param.');
    }
    
    
}