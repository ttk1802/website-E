<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
class Login extends BaseController
{

    public function login()
    {
        $data=[];
        $session=session(); 
        $category_model = new CategoryModel();
    	$categories = $category_model->findAll();
    	$data['categories']=$categories;
        $data['title']= "Đăng nhập";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']= "";
        $data['content']=view("Views/user/pages/login", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }
    public function act_login()
    {
        $session = session();
        $user_model = new UserModel();
        $rs = $user_model->where("email", $this->request->getPost("email"))->where("matkhau", md5($this->request->getPost("password")))->findAll();
        if($rs){
             $session->set("email",$rs[0]['email']);
             $session->set("password",$rs[0]['matkhau']);
            return "<script> location.assign('". base_url(). "/Checkout') </script>";
        }
        else
            echo "failed";
    }
    public function logout()
    {
        $session=session();
         $session->destroy();
        return "<script> location.assign('". base_url(). "/Login') </script>";
    }

    public function act_signup()
    {
        $data = [
            'hotendem'=>$this->request->getPost('fname'),
            'ten'=>$this->request->getPost('lname'),
            'dienthoai'=>$this->request->getPost('phone'),
            'email'=>$this->request->getPost('email'),
            'matkhau'=>md5($this->request->getPost('pw')),
            'quyen'=> 'USER' ,
        ];
           
            $user_model = new UserModel();
            $user_model->insert($data);
            return "<script> location.assign('". base_url(). "/Login') </script>";
     }

}