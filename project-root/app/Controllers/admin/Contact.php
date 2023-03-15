<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ContactModel;
class Contact extends BaseController
{
    public function listContact()
    {
        
    	$contact_model = new ContactModel();
    	$contacts = $contact_model->findAll();
    	$data['title']="Danh sách liên hệ";
    	$data['contacts']=$contacts;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/contactlist", $data);
        return view('Views/admin/main', $data);
    }

    public function del($id){
        $contact_model= new ContactModel();
        $contact_model->delete($id);
        return "<script> location.assign('". base_url(). "/admin/contact/list') </script>";
    }
    
}
