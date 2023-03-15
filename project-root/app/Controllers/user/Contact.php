<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function contact(){
        $data=[];
        $category_model = new CategoryModel();
        $data = [
            
            'categories' =>$category_model->findAll(),
        ];
        $data['title']= "Liên hệ";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/contact", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }
    public function act_add(){
       
        $data = [
         'name'=>$this->request->getPost('name'),
        'email'=>$this->request->getPost('email'),
        'subject'=>$this->request->getPost('subject'),
        'message'=>$this->request->getPost('message'),
        ];
           
            $contact_model = new ContactModel();
            $contact_model->insert($data);
            return "<script> location.assign('". base_url(). "/Contact') </script>";
     }
     public function about(){
        $data=[];
        $category_model = new CategoryModel();
        $data = [
            
            'categories' =>$category_model->findAll(),
        ];

        $data['title']= "Giới thiệu";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/about", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }
 



}