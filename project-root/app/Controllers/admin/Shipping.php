<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ShippingModel;
class Shipping extends BaseController
{
   
   
    public function listshipping()
    {
        
    	$shipping_model = new ShippingModel();
    	$shipping = $shipping_model->findAll();
    	$data['title']="Danh sách dia chi ";
    	$data['shipping']=$shipping;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/shippinglist", $data);
        return view('Views/admin/main', $data);
    }
    public function act_add(){
       
       $data = [
        'hotendem'=>$this->request->getPost('fname'),
       'ten'=>$this->request->getPost('lname'),
       'dienthoai'=>$this->request->getPost('phone'),
       'email'=>$this->request->getPost('email'),
       'matkhau'=>$this->request->getPost('pw'),
       'quyen'=>$this->request->getPost('role')
       ];
          
           $shipping_model = new ShippingModel();
           $shipping_model->insert($data);
           return "<script> location.assign('". base_url(). "/admin/shipping/list') </script>";
    }

    public function updshipping($id){
        $data = [];
        $data['title']='Chỉnh sửa tài khoản';
    	$data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        
        $shipping_model= new ShippingModel();
        $shipping = $shipping_model->find($id);
        $data['shipping']=$shipping;
        $data['content']=view("Views/admin/pages/editshipping", $data);
        return view('Views/admin/main', $data);
    }

    public function act_update(){
        $shipping_model = new ShippingModel();
        $id=$this->request->getPost('id');
        $data = [
            'hotendem'=>$this->request->getPost('fname'),
            'ten'=>$this->request->getPost('lname'),
            'dienthoai'=>$this->request->getPost('phone'),
            'email'=>$this->request->getPost('email'),
            'matkhau'=>$this->request->getPost('pw'),
            'quyen'=>$this->request->getPost('role')
        ];
            $shipping_model->update($id,$data);
            return "<script> location.assign('". base_url(). "/admin/shipping/list') </script>";
     }

     public function del($id){
        $shipping_model= new ShippingModel();
        $shipping_model->delete($id);
        return "<script> location.assign('". base_url(). "/admin/shipping/list') </script>";
    }
    
}
