<?php
namespace app\api1\model;
use think\Model;
class Shop extends Model{
    
    public function shoplist($page=1,$kw='',$orders='s_id',$asc='asc'){
        $wh_str="s_status=0";
        if(strlen($kw)>0){
           $wh_str .= " AND s_name LIKE '%{$kw}%'";
        }
        return $this->where($wh_str)
                    ->order($orders,$asc)
                    ->page($page,4)
                    ->select();
    }

    
}
