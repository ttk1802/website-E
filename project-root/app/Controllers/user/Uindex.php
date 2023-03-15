<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\ShippingModel;
use App\Models\CommentModel;
use CodeIgniter\I18n\Time;
class Uindex extends BaseController
{

   
    public function index()
    {
        $data=[];
        $category_model = new CategoryModel();
        $ProductModel = new ProductModel();
        $min = $ProductModel->productpricemin_home();
        $max = $ProductModel->productpricemax_home();
        if (isset($_GET['from']) && $_GET['to']){
            $price_to = $_GET['to'];
            $price_from = $_GET['from'];
            $count =  $ProductModel->getCategory_Products_price_count_home($price_from,$price_to);
            $data = [
                'products' => $ProductModel->getCategory_Products_price_home($price_from, $price_to)->paginate(3),
                'pager' => $ProductModel->pager,
                'categories' =>$category_model->findAll(),
                'countprodcut' => $count,
                'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                'minprice' => $min[0]['min(sanpham.GiaBan)'],    
            ];
        }else{
            $data = [
                'products' => $ProductModel->paginate(3),
                'pager' => $ProductModel->pager,
                'categories' =>$category_model->findAll(),
                'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                'minprice' => $min[0]['min(sanpham.GiaBan)'],
            ];
        }     
        $data['title']= "Trang chủ";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']=view("Views/user/layout/slide");
        $data['content']=view("Views/user/pages/home", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);       
    }

    public function category($id)
    {
        $data=[];
        $category_model = new CategoryModel();
        // category  all product 
        $ProductModel = new ProductModel();
        $min = $ProductModel->productpricemin($id);
        $max = $ProductModel->productpricemax($id);
        if (isset($_GET['from']) && $_GET['to']){
            $price_to = $_GET['to'];
            $price_from = $_GET['from'];
            $count =  $ProductModel->getCategory_Products_price_count($id, $price_from,$price_to);
            $data = [                
                'Category_products' => $ProductModel->getCategory_Products_price($id, $price_from, $price_to)->paginate(3),
                'pager' => $ProductModel->getCategory_Products($id)->pager,
                'categories' =>$category_model->findAll(),
                'namecate' => $category_model->getCategory_name($id),
                'countprodcut' => $count,
                'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                'minprice' => $min[0]['min(sanpham.GiaBan)'],    
            ];
        }else{
            if (isset($_GET['gia'])){
                $kytu = $_GET['gia'];
                $data = [
                    'Category_products' => $ProductModel->getProductsPrices($id, $kytu)->paginate(3),
                    'pager' => $ProductModel->getCategory_Products($id)->pager,
                    'categories' =>$category_model->findAll(),
                    'namecate' => $category_model->getCategory_name($id),
                    'countprodcut' => $ProductModel->countproduct($id),
                    'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                    'minprice' => $min[0]['min(sanpham.GiaBan)'],                    
                ];
            }
            else{
                if (isset($_GET['kytu'])) {
                    $kytu = $_GET['kytu'];
                    $data = [
                        'Category_products' => $ProductModel->getProductsName($id, $kytu)->paginate(3),
                        'pager' => $ProductModel->getCategory_Products($id)->pager,
                        'categories' =>$category_model->findAll(),
                        'namecate' => $category_model->getCategory_name($id),
                        'countprodcut' => $ProductModel->countproduct($id),
                        'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                        'minprice' => $min[0]['min(sanpham.GiaBan)'],                        
                    ];
                }else{                  
                    $data = [                    
                        'Category_products' => $ProductModel->getCategory_Products($id)->paginate(3),
                        'pager' => $ProductModel->getCategory_Products($id)->pager,
                        'categories' =>$category_model->findAll(),
                        'namecate' => $category_model->getCategory_name($id),
                        'countprodcut' => $ProductModel->countproduct($id),
                        'maxprice' => $max[0]['max(sanpham.GiaBan)'],
                        'minprice' => $min[0]['min(sanpham.GiaBan)'],  
                    ];
                }
            }    
        }          
        $data['title']= "Danh mục";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/category", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }

   
    public function product($id)
    {
        $data=[];
        // all categories
        $category_model = new CategoryModel();
    	$categories = $category_model->findAll();
    	$data['categories']=$categories;
        // all products
        $ProductModel = new ProductModel();
    	$product = $ProductModel->getProducts();
        $data['products']=$product;
        // readall product allowed categories
    	$Category_product = $ProductModel->getCategory_Products($id);
        $data['Category_products']=$Category_product;
        // readsingle product allowed categories
        $product = $ProductModel->getproduct($id);
        $data['product']=$product;
            //  NAME category 
        $Category_name = $ProductModel->getnameCate($id);
        $data['Cate_name']=$Category_name;
            $comment_model = new CommentModel();
        $data['commentlist'] =  $comment_model->getComment($id);
        $data['title']= "Sản phẩm";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/product", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }

    public function addcart($id)
    {
        $session = session();
    //   ADD PRODUCT DETAILS
        if (!empty($this->request->getGet('SL'))) {        
        if (isset($_SESSION['cart'][$id])) {
            $qty  = $_SESSION['cart'][$id] + $this->request->getGet('SL');
        }
        else {
            $_SESSION['cart'][$id] = $this->request->getGet('SL');
            $qty = $this->request->getGet('SL');
        }
      }
//   ADD CART PRODUCT 
        elseif (isset($_SESSION['cart'][$id])) {
            $qty = $_SESSION['cart'][$id] + 1;
        }else{            
            $_SESSION['cart'][$id] = 1;
            $qty = 1;        
        }
        $ProductModel = new ProductModel();
        $product = $ProductModel->find($id);
        $data['product']=$product;
// CHECK qty
        if ($data['product']['SL_TON']< $qty) {
        $_SESSION['cart'][$id] = $data['product']['SL_TON'];
        }else {
        $_SESSION['cart'][$id] = $qty;
        }
        return "<script> location.assign('". base_url(). "/Cart') </script>";
        exit();       
    }

    public function delcart($id)
    {
      $session = session();
      $cart = $_SESSION['cart'];
      
      if ($id == 0) {
        unset($_SESSION['cart']);
      }else{
        unset($_SESSION['cart'][$id]);
      }
      return "<script> location.assign('". base_url(). "/Cart') </script>";
       
    }

    
    public function updatecart()
    {
      $session=session(); 
      foreach($this->request->getPost('qty') as $key=>$value){
        if(($value == 0) and (is_numeric($value))){
            unset($_SESSION['cart'][$key]);
        }
        elseif(($value>0) and (is_numeric($value))){
            $_SESSION['cart'][$key] = $value;
        }
      }
        return "<script> location.assign('".$_SERVER['HTTP_REFERER']."') </script>";
        exit();
       
    }

    public function cart()
    {
        $session=session(); 
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
        $data['title']= "Giỏ hàng";
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/cart", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }

    public function search()
    {  
        if (isset($_GET['key']) && isset($_GET['key']) != "") {
          $key = $_GET['key'];
        }
         $data=[];
        // category nav
        $category_model = new CategoryModel();      
        // category  all product 
        $ProductModel = new ProductModel();       
        $data['key'] = $ProductModel->getkey($key);
        $data = [
            'Category_products' => $ProductModel->getkey($key)->paginate(3),
            'pager' => $ProductModel->getkey($key)->pager,
            'categories' =>$category_model->findAll(),
        ];
        if (isset($_GET['key']) && isset($_GET['key']) != "") {
            $data['title']=  $_GET['key'];
            $data['namekey']= 'Kết quả tìm kiếm cho từ khóa: '. $_GET['key'];
        }       
    	$data['head']=view("Views/user/layout/head", $data);
    	$data['slide']="";
        $data['content']=view("Views/user/pages/search", $data);
        $data['footer']=view("Views/user/layout/footer");
        return view('Views/user/main',$data);
    }
    public function comment_send(){
        $myTime = new Time('now' , 'Asia/Ho_Chi_Minh');
        $comment_model = new CommentModel();
        $data = [
            'name'=>$this->request->getPost('comment_name'),
            'email'=>$this->request->getPost('comment_email'),
            'comment'=>$this->request->getPost('comment'),
            'status'=> 0,
            'product_id'=>$this->request->getPost('product_id'),
            'date_created'=> $myTime,
           ];   
        $comment_model->insert($data);
    }
}