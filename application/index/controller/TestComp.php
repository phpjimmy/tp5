<?php
namespace app\index\controller;
use think\Controller;
class TestComp extends Controller{
   
    public function index1(){
       $objPHPExcel = new \PHPExcel();
       var_dump($objPHPExcel);
    }

   
    
}


