<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ShippingModel;
use App\Models\ProductModel;
class Order extends BaseController
{
    public function listOrder()
    {        
    	$order_model = new OrderModel();
    	$orders = $order_model->getOrders();
    	$data['title']="Danh sách đơn hàng";
    	$data['orders']=$orders;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/orderlist", $data);
        return view('Views/admin/main', $data);
    }
    public function del(){
        $id = $this->request->getPost('id');
        $MaDH = $this->request->getPost('MaDH');
        $orderdetal_model = new OrderDetailModel();       
        $orderdetal_model->DeleteOrders_detail($MaDH);
        $order_model = new OrderModel();
        $order_model->delete($id);       
        return "<script> location.assign('". base_url(). "/admin/order/list') </script>";
    } 
    public function process(){
        $value = $this->request->getPost('value');
        $order_code = $this->request->getPost('id');
        $data = [
            'status'=>$value,
        ];
        $order_model = new OrderModel();
        $order_model->update($order_code, $data);
    }
    
}