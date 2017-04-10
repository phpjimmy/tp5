<?php
namespace app\api\controller;
use think\Controller;
class Shop extends Controller{
    
    
//    shopid	是	string	商家id
//    page	是	string	页数
    //商家菜系列表
    public function shopcatlist($shopid='',$page=''){
         $shopid = input('param.shopid');
         $page = input('param.page');
        
         if($page >=3){
             return ['error_code'=>1,'data'=>['meallist'=>'已是菜系列表尾页,请稍候重试...']];
         }else{
             $res = db('category')->where('cate_status',0)
                                  ->where('cate_shop_id',"$shopid")
                                  ->limit(1)
                                  ->page($page)
                                  ->field('cate_id,cate_shop_id,cate_name')
                                  ->select();
             return ['error_code'=>0,'data'=>['mealcatlist'=>$res]];
         }
        
        //指定页数
        //return $page;
//         if($page >=3 ){
//               return ['error_code'=>1,'data'=>['meallist'=>'已是菜系列表尾页,请稍候重试...']];
//         }else{
//              $res = db('category')->where('cate_status',0)
//                                 ->limit(2)
//                                 ->page($page)
//                                 ->field('cate_id,cate_shop_id,cate_name')
//                                 ->select();
//               return ['error_code'=>0,'data'=>['mealcatlist'=>$res]];
//         }
   
    }
    
    
//    shopid	是	string	商家id
//    page	是	string	页数
//    catid	否	string	菜系id 0:不指定, 1:指定
//    keyword	否	string	搜索关键字
    //商家套餐列表
    public function shopmeallist($shopid='',$page='',$catid='',$keyword=''){
        $shopid = input('param.shopid');
        $page = input('param.page');
        $catid = input('param.catid');
        $keyword = input('param.keyword');
        
         
        if($page >=3){
             return ['error_code'=>1,'data'=>['meallist'=>'已是套餐列表尾页,请稍候重试...']];
        }else{
            $res = db('meal')->alias('m')
                             ->join('w_category c','m.m_cate_id=c.cate_id')
                             ->where('m.m_status',0)
                             ->where('m.m_shop_id',"$shopid")
                             ->limit(2)
                             ->page($page)
                             ->field('m.m_id,m.m_name,c.cate_name,m_img,m.m_price,m_store,m_sale')
                             ->select();
            return ['error_code'=>0,'data'=>['meallist'=>$res]];
        }
             
              
        
        
         //分页
        //return $page;
//        if($page >=5){
//             return ['error_code'=>1,'data'=>['meallist'=>'已是套餐列表尾页,请稍候重试...']];
//        }else{
//            $res = db('meal')->alias('m')
//                              ->join('w_category c','m.m_cate_id=c.cate_id')
//                              ->where('m.m_status',0)
//                              ->limit(2)
//                              ->page($page)
//                              ->field('m.m_id,m.m_name,c.cate_name,m_img,m.m_price,m_store,m_sale')
//                              ->select();
//            return ['error_code'=>0,'data'=>['meallist'=>$res]];
//      
//        }
        
        
        
        //指定菜系
        //return $catid;
        if($catid == 0){
            $res = db('meal')->alias('m')
                              ->join('w_category c','m.m_cate_id=c.cate_id')
                              ->where('m.m_status',0)
                              ->field('m.m_id,m.m_name,c.cate_name,m_img,m.m_price,m_store,m_sale')
                              ->select();
            return ['error_code'=>0,'data'=>['meallist'=>$res]];
        }else if($catid == 1){
           $res = db('meal')->alias('m')
                            ->join('w_category c','m.m_cate_id=c.cate_id')
                            ->where('m.m_status',0)
                            ->field('m.m_id,m.m_cate_id,m.m_name,c.cate_name,m_img,m.m_price,m_store,m_sale')
                            ->select();
            return ['error_code'=>0,'data'=>['meallist'=>$res]];
        }
        
        
        
        //return $keyword;
        //搜索关键字
        //SELECT * FROM w_shop WHERE s_status=0 AND (s_name LIKE '%烩面%' OR s_keyword LIKE '%烩面%')
        if($keyword){
             $res = db('meal')->alias('m')
                              ->join('w_category c','m.m_cate_id=c.cate_id')
                              ->where('m.m_name','like',"%$keyword%")
                              ->where('m.m_status',0)
                              ->field('m.m_id,m.m_name,c.cate_name,m_img,m.m_price,m_store,m_sale')
                              ->select();
            return ['error_code'=>0,'data'=>['meallist'=>$res]];
        } 
       
    }  
    
    
//    page	是	string	当前页数
//    orderflag	是	string	排序规则 0:默认 1:评星 2:套餐数量
//    keyword	否	string	搜索关键词
    //周边商家
    public function shoplist($page='',$orderflag='',$keyword=''){
        //周边商家  SELECT * FROM w_shop WHERE s_status=0 AND (s_name LIKE '%烩面%' OR s_keyword LIKE '%烩面%');
        $s = db('shop');
        $info = $s->where('s_status',0)
                  ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
                  ->select();   //二维数组
         //dump($info);
        //$info = ['shopid'=>$info['']['s_id'],'shoptitle'=>$info['']['s_name'],'shopaddr'=>$info['']['s_address'],'shoplogo'=>$info['']['s_logo'],'totalstar'=>$info['']['s_star'],'totalmealnum'=>$info['']['s_mealsalenum'],];
        //dump($info);
         $ret = ['error_code'=>0];
         $ret['data']['shoplist']= $info;
         //return $ret;
         
         $page = input('get.page');
         $orderflag = input('get.orderflag');
         $keyword = input('get.keyword');
         
         
         //指定页数
         //return $page;
//         if($page <=4){
//             $res = db('shop')->where('s_status',0)
//                              ->limit(2)
//                              ->page($page)
//                              ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
//                              ->select();
//             return ['error_code'=>0,'data'=>['shoplist'=>$res]];
//               
//         }else{
//              return ['error_code'=>1,'data'=>['meallist'=>'已是商家列表尾页,请稍候重试...']];
//         }
         
         
         
         //指定排序规则
         //return $orderflag;
       
            if($orderflag == 0){
                 $res = db('shop')->where('s_status',0)
                                  ->limit(2)
                                  ->page($page)
                                  ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
                                  ->select();
                 return ['error_code'=>0,'data'=>['totalPage'=>4,'currentPage'=>$page,'shoplist'=>$res]];
             }else if($orderflag == 1){
                 $res = db('shop')->where('s_status',0)
                                  ->limit(2)
                                  ->page($page)
                                  ->order('s_star desc')
                                  ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
                                  ->select();
                 return ['error_code'=>0,'data'=>['totalPage'=>4,'currentPage'=>$page,'shoplist'=>$res]];
             }else if($orderflag == 2){
                 $res = db('shop')->where('s_status',0)
                                  ->limit(2)
                                  ->page($page)
                                  ->order('s_mealtotalnum desc')
                                  ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
                                  ->select();
                 return ['error_code'=>0,'data'=>['totalPage'=>4,'currentPage'=>$page,'shoplist'=>$res]];
             }
             
         
         //指定关键字
         //return $keyword;
         if($keyword){
             $res = db('shop')->where('s_name','like',"%$keyword%")
                              ->where('s_status',0)
                              ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum')
                              ->select();
            return ['error_code'=>0,'data'=>['shoplist'=>$res]];
         } 
         
        
        
    }
    
    
//    shopid	是	int	商家id
//    getimgsflag	是	int	是否获取图集 0:不获取 1:获取
//    getmealflag	是	int	是否获取套餐 0:不获取 1:获取
//    getcatflag	是	int	是否获取菜系列表 0:不获取 1:获取
//    000 001 010 011 100 101 110 111 共八种情况
    //商家详情
    public function shopinfo($shopid='',$getimgsflag='',$getmealflag='',$getcatflag=''){
        $shopid = input('get.shopid');
        $getimgsflag = input('get.getimgsflag');
        $getmealflag = input('get.getmealflag');
        $getcatflag = input('get.getcatflag');
        
        $res = db('shop')->where('s_status',0)->where('s_id',"$shopid")->select();
        //return ['error_code'=>0,'data'=>['shopinfo'=>$res]];
        
        if($getimgsflag == 0 && $getmealflag ==0 && $getcatflag ==0){
            $info = db('shop') ->where('s_id',"$shopid")
                               ->where('s_status',0)
                               ->field('s_id,s_name,s_address,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                               ->select();
            return ['error_code'=>0,'data'=>['shopinfo'=>$info]];
        }else if($getimgsflag == 1 && $getmealflag ==1 && $getcatflag ==1){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
              $imglist = db('meal')->where('m_shop_id',"$shopid")
                                   ->where('m_status',0)
                                   ->field('m_img')
                                   ->select();
              //dump($imglist);
              $meallist = db('meal')->where('m_shop_id',"$shopid")
                                    ->where('m_status',0)
                                    ->field('m_id,m_name,m_img,m_price,m_store,m_sale')
                                    ->select();
              $mealcatlist = db('category')->where('cate_shop_id',"$shopid")
                                           ->where('cate_status',0)
                                           ->field('cate_id,cate_name')
                                           ->select();
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'imglist'=>$imglist,
                    'meallist'=>$meallist,
                    'mealcatlist'=>$mealcatlist
                    ]
               ];
            
        }else if($getimgsflag == 0 && $getmealflag ==0 && $getcatflag ==1){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
             
              $mealcatlist = db('category')->where('cate_shop_id',"$shopid")
                                           ->where('cate_status',0)
                                           ->field('cate_id,cate_name')
                                           ->select();
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'mealcatlist'=>$mealcatlist
                    ]
               ];
            
        }else if($getimgsflag == 0 && $getmealflag ==1 && $getcatflag ==0){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
              
              $meallist = db('meal')->where('m_shop_id',"$shopid")
                                    ->where('m_status',0)
                                    ->field('m_id,m_name,m_img,m_price,m_store,m_sale')
                                    ->select();
             
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'meallist'=>$meallist,
                    ]
               ];
            
        }else if($getimgsflag == 0 && $getmealflag ==1 && $getcatflag ==1){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
            
              $meallist = db('meal')->where('m_shop_id',"$shopid")
                                    ->where('m_status',0)
                                    ->field('m_id,m_name,m_img,m_price,m_store,m_sale')
                                    ->select();
              $mealcatlist = db('category')->where('cate_shop_id',"$shopid")
                                           ->where('cate_status',0)
                                           ->field('cate_id,cate_name')
                                           ->select();
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'meallist'=>$meallist,
                    'mealcatlist'=>$mealcatlist
                    ]
               ];
            
        }else if($getimgsflag == 1 && $getmealflag ==0 && $getcatflag ==0){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
              $imglist = db('meal')->where('m_shop_id',"$shopid")
                                   ->where('m_status',0)
                                   ->field('m_img')
                                   ->select();
             
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'imglist'=>$imglist,
                    ]
               ];
            
        }else if($getimgsflag == 1 && $getmealflag ==0 && $getcatflag ==1){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
              $imglist = db('meal')->where('m_shop_id',"$shopid")
                                   ->where('m_status',0)
                                   ->field('m_img')
                                   ->select();
              
              $mealcatlist = db('category')->where('cate_shop_id',"$shopid")
                                           ->where('cate_status',0)
                                           ->field('cate_id,cate_name')
                                           ->select();
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'imglist'=>$imglist,
                    'mealcatlist'=>$mealcatlist
                    ]
               ];
            
        }else if($getimgsflag == 1 && $getmealflag ==1 && $getcatflag ==0){
              $shopinfo = db('shop')->where('s_status',0)
                                    ->where('s_id',"$shopid")
                                    ->field('s_id,s_name,s_address,s_logo,s_star,s_mealtotalnum,s_mealsalenum,s_intr')
                                    ->select();
              $imglist = db('meal')->where('m_shop_id',"$shopid")
                                   ->where('m_status',0)
                                   ->field('m_img')
                                   ->select();
              //dump($imglist);
              $meallist = db('meal')->where('m_shop_id',"$shopid")
                                    ->where('m_status',0)
                                    ->field('m_id,m_name,m_img,m_price,m_store,m_sale')
                                    ->select();
            
              return [
                'error_code'=>0,
                'data'=>[
                    'shopinfo'=> $shopinfo,
                    'imglist'=>$imglist,
                    'meallist'=>$meallist,
                    ]
               ];
            
        }
        
        
        
        
        
    }
    //底部
    
    
    
}


