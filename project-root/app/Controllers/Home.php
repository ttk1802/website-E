<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[];
        $data['title']= "Trang chủ";
    	$data['head']=view("Views/user/layout/head");
    	$data['slide']=view("Views/user/layout/slide");
        $data['content']=view("Views/user/pages/home");
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }
    public function login()
    {
        $session=session(); 
        $session->destroy();
        return view('Views/login');
    }

    public function act_login()
    {
        $session = session();
        $user_model = new UserModel();
        $rs = $user_model->where("email", $this->request->getPost("email"))->where("matkhau", md5($this->request->getPost("password")))->findAll();
        if($rs){
             $session->set("email",$rs[0]['email']);
             $session->set("password",$rs[0]['matkhau']);
            return "<script> location.assign('". base_url(). "/admin/user/list') </script>";
        }
        else
            echo "failed";
    }
  
}
