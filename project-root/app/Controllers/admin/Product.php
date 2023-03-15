<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
class Product extends BaseController
{
    public function listProduct()
    {        
        $CategoryModel = new CategoryModel();
        $Category = $CategoryModel->findAll();
        $data['categories']=$Category;
    	$ProductModel = new ProductModel();
    	$product = $ProductModel->getProducts();
    	$data['title']="Danh sách sản phẩm";
    	$data['products']=$product;
        $data['left']=view("Views/admin/layout/sidebar-left");
    	$data['head']=view("Views/admin/layout/topnav");
        $data['content']=view("Views/admin/pages/productlist", $data);
        return view('Views/admin/main', $data);
    }
    public function act_add(){       
        $path = "frontend/images/product/";
        $file = $this->request->getFile('HA');
        if ($file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($path, $newName);
            $image = \Config\Services::image();
            $image->withFile('frontend/images/product/'.$newName)
            ->fit(110, 110 , 'center')
            ->save('frontend/images/cart/'.$newName);
        }
       $data = [
        'TenMH'=>$this->request->getPost('TenMH'),
       'Giaban'=>$this->request->getPost('GiaBan'),
       'GiaNhap'=>$this->request->getPost('GiaNhap'),
       'GiaKhuyenMai'=>$this->request->getPost('GKM'),
       'SL_TON'=>$this->request->getPost('slt'),
       'KichThuoc'=>$this->request->getPost('KT'),
       'MacSac'=>$this->request->getPost('MS'),
       'DVT'=>$this->request->getPost('DVT'),
       'HinhAnh'=>$newName,
       'MoTa'=>$this->request->getPost('MT'),
       'MaDM'=>$this->request->getPost('DM'),
       'slugsp'=>$this->request->getPost('slugsp'),
       ];         
        // print_r($data);
            $ProductModel = new ProductModel();
            $ProductModel->insert($data);
            return "<script> location.assign('". base_url(). "/admin/product/list') </script>";
    }

    public function act_update(){
        $ProductModel = new ProductModel();
        $id=$this->request->getPost('id');
        $path = "frontend/images/product/";      
        if(empty($_FILES['HA']['name'])){
            $newName = $this->request->getPost('HA_old');
        $file = $this->request->getFile('HA');
        }else {
            $file = $this->request->getFile('HA');
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $image = \Config\Services::image();
                $image->withFile('frontend/images/product/'.$newName)
                ->fit(110, 110 , 'center')
                ->save('frontend/images/cart/'.$newName);
            }
        }    
        $data = [
            'TenMH'=>$this->request->getPost('TenMH'),
            'Giaban'=>$this->request->getPost('GiaBan'),
            'GiaNhap'=>$this->request->getPost('GiaNhap'),
            'GiaKhuyenMai'=>$this->request->getPost('GKM'),
            'SL_TON'=>$this->request->getPost('slt'),
            'KichThuoc'=>$this->request->getPost('KT'),
            'MacSac'=>$this->request->getPost('MS'),
            'DVT'=>$this->request->getPost('DVT'),
            'HinhAnh'=>$newName,
            'MoTa'=>$this->request->getPost('MT'),
            'MaDM'=>$this->request->getPost('DM'),
            'slugsp'=>$this->request->getPost('slugsp'),
        ];    
        $ProductModel->update($id,$data);
        return "<script> location.assign('". base_url(). "/admin/product/list') </script>";
     }

     public function del($id){
        $ProductModel= new ProductModel();
        $ProductModel->delete($id); 
        return "<script> location.assign('". base_url(). "/admin/product/list') </script>";
    }    
}
