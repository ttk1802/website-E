<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
class Category extends BaseController
{
   
    public function listCategory()
    {
    	$category_model = new CategoryModel();
    	$categories = $category_model->findAll();
    	$data['title']="Danh mục sản phẩm";
    	$data['categories']=$categories;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/categorylist", $data);
        return view('Views/admin/main', $data);
    }
    public function act_add(){
       
       $data = [
        'TenDM'=>$this->request->getPost('TenDM'),
        'slug'=>$this->request->getPost('slug'),
       ];
          
           $category_model = new CategoryModel();
           $category_model->insert($data);
           return "<script> location.assign('". base_url(). "/admin/category/list') </script>";
    }

    public function updCategory($id){
        $data = [];
        $data['title']='Chỉnh sửa danh mục';
    	$data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        
        $category_model= new CategoryModel();
        $category = $category_model->find($id);
        $data['category']=$category;
        $data['content']=view("Views/admin/pages/editcategory", $data);
        return view('Views/admin/main', $data);
    }
    public function act_update(){
        $category_model = new CategoryModel();
        $id=$this->request->getPost('id');
        $data = [
            'TenDM'=>$this->request->getPost('TenDM'),
            'slug'=>$this->request->getPost('slug'),
        ];
            $category_model->update($id,$data);
          
            return "<script> location.assign('". base_url(). "/admin/category/list') </script>";
     }

     public function del($id){
        $category_model= new CategoryModel();
        $category_model->delete($id);
        return "<script> location.assign('". base_url(). "/admin/category/list') </script>";
    }
    
}
