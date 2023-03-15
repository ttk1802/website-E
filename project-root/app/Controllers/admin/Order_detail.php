<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
class Order_detail extends BaseController
{
    public function listOrder_detail($id)
    {
    	$orderdetail_model = new OrderDetailModel();
    	$orderdetails = $orderdetail_model->getOrders_detail($id);
      
        if (empty($orderdetails)) {
            return "<script> location.assign('". base_url(). "/admin/order/list') </script>";
        }
        else{
            $data['title']="Chi tiết đơn hàng";
            $data['orderdetails']=$orderdetails;          
            $data['left']=view("Views/admin/layout/sidebar-left");
            $data['head']=view("Views/admin/layout/topnav");
            $data['content']=view("Views/admin/pages/order_detaillist", $data);
            return view('Views/admin/main', $data);
        }
    }    
}
