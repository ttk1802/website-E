<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
class User extends BaseController
{
    public function index()
    {
    	$data=[];
        $data['title']= "Trang chủ";
    	$data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/home");
        return view('Views/admin/main',$data);
    }
   
    public function listUser()
    {
        
    	$user_model = new UserModel();
    	$users = $user_model->findAll();
    	$data['title']="Danh sách tài khoản";
    	$data['users']=$users;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/userlist", $data);
        return view('Views/admin/main', $data);
    }
    public function act_add(){
       
       $data = [
        'hotendem'=>$this->request->getPost('fname'),
       'ten'=>$this->request->getPost('lname'),
       'dienthoai'=>$this->request->getPost('phone'),
       'email'=>$this->request->getPost('email'),
       'matkhau'=>md5($this->request->getPost('pw')),
       'quyen'=>$this->request->getPost('role')
       ];
          
           $user_model = new UserModel();
           $user_model->insert($data);
           return "<script> location.assign('". base_url(). "/admin/user/list') </script>";
    }

    public function act_update(){
        $user_model = new UserModel();
        $id=$this->request->getPost('id');
        $data = [
            'hotendem'=>$this->request->getPost('fname'),
            'ten'=>$this->request->getPost('lname'),
            'dienthoai'=>$this->request->getPost('phone'),
            'email'=>$this->request->getPost('email'),
            'matkhau'=>md5($this->request->getPost('pw')),
            'quyen'=>$this->request->getPost('role1')
        ];
            $user_model->update($id,$data);
           
            return "<script> location.assign('". base_url(). "/admin/user/list') </script>";
     }

     public function del($id){
        $user_model= new UserModel();
        $user_model->delete($id);
        return "<script> location.assign('". base_url(). "/admin/user/list') </script>";
    }
    
}
