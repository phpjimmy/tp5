<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller{
    
    //----------1绝对路径（动态） 2.相对路径 3绝对路径（静态）
    public function testpath(){
        //return APP_ROOT;
        $imgurl = APP_ROOT."/static/img/10.jpg";
//        return $imgurl;
        $this->assign('imgurl',$imgurl);
        return $this->fetch();
        //dump($_SERVER);
    }

     //测试tp5中使用composer 依赖库
    public function index1(){
       $objPHPExcel = new \PHPExcel();
	var_dump($objPHPExcel);
    }
    
    //路由测试-----------
    public function hello(){
        $param = input('param.');
        return json_encode($param);
    }

        public function testAPI(){
          return $this->fetch();
//        $this->redirect('api/User/login',['loginid'=>$loginid,'password'=>$password]);
    }

    public function index(){
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    
    public function testa(){
        echo 'testa1';
        echo input('get.id');
        
        $this->assign('test','1234');
        
        //渲染模板
        return view('testa');
    }
    
    public function testb($login=0,$pwd=0){
        echo $login.'<br>'.$pwd;
    }
    
     public function testdb(){
         //连接数据库 1.配置文件定义 database.php
          //2.方法配置  字符串方式; 数据库类型://用户名:密码@数据库地址:数据库端口/数据库名#字符集
//        Db::connect('mysql://root:123456@127.0.0.1:3306/O2O_test1#utf8');
        
//        Db::connect('db_config1');
//        Db::connect('db_config2');
        
        //3.模型类配置
         
         
         //原生查询: 支持 query （查询操作）和 execute （写入操作）方法
//        $ret = \think\Db::query('select * from w_meal where m_status=0');
//          $ret = \think\Db::execute('insert into w_rider (r_name,r_mobile) values ("顺风",12312312312)');
          
           //table方法查询:  Db::name 或者 Db::table 方法
//         $ret = \think\Db::table('w_meal')->where('m_id',1)->find();
//         $ret = \think\Db::table('w_meal')->where('m_status',0)->select();
//         $ret = \think\Db::name('meal')->where('m_id',1)->find();
//         $ret = \think\Db::name('meal')->where('m_status',0)->select();
         
            // db 助手函数方法查询
//            $ret = db('meal')->where('m_id',1)->find();
//            $ret = db('meal')->where('m_status',0)->select();
//            dump($ret);
            
            //使用查询对象进行查询
//            $query = new \think\db\Query();
//            $query->table('w_meal')->where('m_status',0);
//            \think\Db::find($query);
//            \think\Db::select($query);
            
            //使用闭包函数查询
//            \think\Db::select(function($query){
//               $query->table('w_meal')-where('m_status',0); 
//            });
         
         //添加:   insert 方法添加数据成功返回添加成功的条数，insert 正常情况返回 1
         //Db 类的 name方法提交数据
         $data = ['r_name'=>""];
         \think\Db::name('meal')->insert($data);
        
        
       
    }

    public function login(){
       $this->redirect('Login/index');
    }
    
}


