<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\SubscriberModel;

class Subscriber extends BaseController
{
    
    public function act_add(){
       
        $data = [
        'email'=>$this->request->getPost('email'),
        ];
           
            $sub_model = new SubscriberModel();
            $sub_model->insert($data);
            return "<script> location.assign('". base_url(). "/About') </script>";
     }
 
 



}