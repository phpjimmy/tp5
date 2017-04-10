<?php
namespace app\api\controller;
use think\Controller;
class User extends Controller{
    
      function login1($loginid='',$password=''){
          //参数验证
          //数据获取
          //数据返回
         $req = input('get.');
        // return $req;
         
         if($loginid){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:账号不能为空';
         }
        
         if($password){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:密码不能为空';
         }
         
        $u = db('user');
        $res = $u->where('u_status',0)->where('u_id',1)->field('u_id,u_name,nickname,mobile,regtime,lastlogintime')->select();
       // return $res;
        
       // $req['password']= md5($req['password']);
        //$req['regtime'] =date('Y-m-d H:i:s');
        //$req['lastlogintime'] =date('Y-m-d H:i:s');

        //unset($req['loginid']);
       //unset($req['password']);
        
        $req = ['error_code'=>0];
        $req['data'] = $res;
        return $req;
        
      }
      
      public function login(){
            //return input('param.');     
            $loginid = input('param.loginid');
             // return $loginid;
            $password = input('param.password');
            if(empty($loginid)||empty($password)){
                return ['error_code'=>1,'error_msg'=>'账号或密码不能为空' ];
            }else{
                $res = db('user')->where('loginid',$loginid)->where('password',$password)->find();
                //  return $res;
                // die();
                if($res){
                    $data=['uid'=>$res['u_id'],'username'=>$res['u_name'],'nickname'=>$res['nickname'],'mobile'=>$res['mobile'],'reg_time'=>$res['regtime'],'last_login_time'=>$res['lastlogintime']];
                    return ['error_code'=>0,'data'=>$data];
                }else{
                    return ['error_code'=>2,'error_msg'=>'账号或密码错误'];
                }
             }
       }
      
      function register11(){
       return $this->fetch('register');
    }
    
            
      function register1($loginid='',$password='',$mobile='',$smscode='',$nickname=''){
         $req = ['error_code'=>0];
        
         $req = input('get.');
         //return $req;
         
         
//        $loginid = input('get.loginid');
//        $password = input('get.password');
//        $mobile = input('get.mobile');
//        $smscode = input('get.smscode');
//        $nickname = input('get.nickname');
      
        
        if(!$loginid){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:账号不能为空';
        }
        
        if(!$password){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:密码不能为空';
        }
        
        if($mobile && strlen($mobile)!=11){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:手机号码错误';
        }
        
        if(strlen($smscode)==4){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:验证码错误';
        }
        
        if($nickname && strlen($nickname) <4 && strlen($nickname)>10){
            $ret['error_code']=1;
            $ret['error_msg']='参数错误:昵称错误';
        }
        
        //验证码
        
        
        //连接数据库->验证 ->
        $req['password']= md5($req['password']);
        $req['regtime'] =date('Y-m-d H:i:s');
        
        unset($req['password']);
        $res = db('user')->insertGetId($req);
        // dump($res);
        
        
       // $req = ['error_code'=>0];
        $req['uid'] = $res;
        return $req;
        
    }
    
    
      public function register(){
          
            $info = input('param.');
            //return $info;
            //die();

            $loginid = input('param.loginid');
            $password = input('param.password');
            $mobile = input('param.mobile');       //?input('param.moblile'):'1';
            //  return $mobile;
            // die();
            
            $smscode = input('param.smscode');
            $nickname = input('param.nickname');
            $username = input('param.username');
            
            
            if(empty($loginid)||empty($password)){
                return ['error_code'=>1,'error_msg'=>'登录账号或密码不能为空'];
            }else{
                $regtime = date('Y-m-d H:i:s');
                $info = ['loginid'=>$loginid,'password'=>$password,'mobile'=>$mobile,'nickname'=>$nickname,'u_name'=>$username,'regtime'=>$regtime]; 
                $id = db('user')->insertGetId($info);
                
                $res = db('user')->where('u_id',$id)->find();
                $data = ['u_id'=>$id,'username'=>$res['u_name'],'nickname'=>$res['nickname'],'mobile'=>$res['mobile'],'reg_time'=>$res['regtime'],'last_login_time'=>$res['lastlogintime'],'usertype'=>$res['u_type']];
                return ['error_code'=>0,'data'=>$data];
            }
            
      }
    
   

    
}




