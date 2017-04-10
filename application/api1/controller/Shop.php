<?php
namespace app\api1\controller;

class Shop extends Base{
    
    public function shoplist($page=1,$kw='',$orderflag=0){
        $orders = 's_id';
        $asc = 'asc';
        if($orderflag ==1){
            $orders = 'listno';
        }
        $list = model('shop')->shoplist($page,$kw,$orders,$asc);
        return $this->response($list);
    }
    
    
}