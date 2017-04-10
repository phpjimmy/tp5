<?php
namespace app\index\controller;
use think\Controller;
class Login extends Controller {
    public function index(){
        // 获取包含域名的完整URL地址
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
//        return $this->fetch();
    }
    
    public function dologin(){
        //登录处理
        //获取数据
        $loginid = input('get.loginid');
        $password = input('get.password');
        $code = input('get.verify');
        
        $res = $this->validate($code,[
            'captcha|验证码'=>'require|captcha'
        ]);
        if(!$res){
            $this->error('验证码错误');
            return;
        }
        
        echo $loginid.'<br>'.$password;
        
       
      
    }
    
    
    
    
}
