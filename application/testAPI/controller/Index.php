<?php
namespace app\testAPI\controller;
use think\Controller;
class Index extends Controller{
    // 原生SQL，写操作必须用模型的execute方法，读操作必须用模型的query方法
    public function testr(){
       return db('people')->select();
    }
    
    public function testw(){
         $res = db('people')->insert(['name'=>"王五". rand(0, 100)]);
         return $res;
         
    }
    
}


