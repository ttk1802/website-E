<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\SubscriberModel;
class Subscriber extends BaseController
{
    public function listsubscriber()
    {
        
    	$sub_model = new SubscriberModel();
    	$subs = $sub_model->findAll();
    	$data['title']="Danh sách theo dõi";
    	$data['subs']=$subs;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/subscriberlist", $data);
        return view('Views/admin/main', $data);
    }
    public function del($id){
        $sub_model= new SubscriberModel();
        $sub_model->delete($id);
        return "<script> location.assign('". base_url(). "/admin/subscriber/list') </script>";
    }
    
}
