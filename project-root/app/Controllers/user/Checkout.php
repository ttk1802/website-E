<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\ShippingModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;


class Checkout extends BaseController
{


    public function checkout()
    {
        $session=session(); 
        if (!empty($_SESSION['cart'])) {
            $data=[];
            $category_model = new CategoryModel();
            $categories = $category_model->findAll();
            $data['categories']=$categories;
            
            $ProductModel = new ProductModel();
            if(empty($_SESSION['cart'])){
                
            }else{
                foreach ($_SESSION['cart'] as $key=>$value){
                    $item[]=$key;
                }
                $str = implode(",",$item);
                $data['products']=$ProductModel->find($item);
            }            
            $data['title']= "Checkout";
            $data['head']=view("Views/user/layout/head", $data);
            $data['slide']= "";
            $data['content']=view("Views/user/pages/checkout", $data);
            $data['footer']=view("Views/user/layout/footer");
            return view('Views/user/main',$data);
       }else
       return "<script> location.assign('". base_url(). "/Cart') </script>";
       
    }  

    public function confirm_checkout(){
        $data = [
            'Hoten'=>$this->request->getPost('name'),
           'diachi'=>$this->request->getPost('ar'),
           'sdt'=>$this->request->getPost('phone'),
           'email'=>$this->request->getPost('email'),
           'phuongthuc'=>$this->request->getPost('shipping')
           ];
               $shipping_model = new ShippingModel();
               $shipping_model->insert($data);
// order
            $Mavc = $shipping_model->insert($data);
            $MaDH = rand(00,9999);
            $data_order = [
            'MaDH'=>$MaDH,
            'status'=>1,
            'MaVC'=>$Mavc
            ];
            $order_model = new OrderModel();
            $order_model->insert($data_order);
// details
            $ProductModel = new ProductModel();
            $session=session(); 
            foreach ($_SESSION['cart'] as $key=>$value){
                $item[]=$key;
            }
            $str = implode(",",$item);
            $data['products']=$ProductModel->find($item);
            foreach($data['products'] as $row){
                $data_detail = [
                'MaDH'=>$MaDH,
                'MaMH'=>$row['MaMH'],
                'SL'=>$_SESSION['cart'][$row['MaMH']],
                ];
            $id = $row['MaMH'];
            $data_product = 
            [
                'SL_TON' => $row['SL_TON'] - $_SESSION['cart'][$row['MaMH']]
            ];
                $orderdetail_model = new OrderDetailModel();
                $orderdetail_model->insert($data_detail);
                if($row['SL_TON']>0){
                    $ProductModel->update($id,$data_product);
                }           
            }
          //  $this->sendmail();           
           unset($_SESSION['cart']);
           return "<script> location.assign('". base_url(). "/Thanks') </script>";
    }
    public function sendmail(){
      
        //Khởi tạo đối tượng email
        $email = Config\Services::email();
        //Khai báo cấu hình gửi mail
        $email->initialize([
            'protocol'    => 'smtp',
            'SMTPHost'    => 'smtp.domain.com',
            'SMTPUser'    => 'username',
            'SMTPPass'    => 'password'
        ]);
        //Khai báo thông tin gửi mail
        $email->setFrom('from@domain.com', 'From Name')
            ->setTo('to@domain.com', 'To Name')
            ->setSubject('Gextend subject')
            ->setMessage('Welcome to Gextend');
            
        //Gửi mail
        $email->send();
    }
    public function thanks()
    {
        $data=[];
        $category_model = new CategoryModel();
    	$categories = $category_model->findAll();
    	$data['categories']=$categories;


        $ProductModel = new ProductModel();
    	$product = $ProductModel->getProducts();
        $data['products']=$product;


        $data['title']= "Cảm ơn";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/thank", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
       
    }  

}