<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
   
    protected $table = 'sanpham';
    protected $primaryKey = 'MaMH';
    protected $allowedFields = ['TenMH', 'Giaban',
     'GiaNhap', 'GiaKhuyenMai', 'SL_TON', 'KichThuoc','MacSac', 'DVT', 'HinhAnh', 'MoTa', 'MaDM', 'slugsp'];

    // lấy tất cả sản phẩm
    public function getProducts() {
        return $this->db->table($this->table)->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')->get()->getResult('array');
    }
    // sắp xếp sản phẩm theo tên và danh mục
    public function getProductsName($id, $kytu) {
        $this->builder() ->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')
        ->where('dmsanpham.MaDM', $id)
        ->orderBy('sanpham.TenMH', $kytu);
        return $this; 
    }
  // sắp xếp sản phẩm theo giá và danh mục
    public function getProductsPrices($id, $kytu) {
        $this->builder() ->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')
        ->where('dmsanpham.MaDM', $id)
        ->orderBy('sanpham.Giaban', $kytu);
        return $this; 
    }
    // lấy tên danh mục theo của mặt hàng
    public function getnameCate($id) {
        $query = $this->db->table($this->table)
        ->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')
        ->where('sanpham.MaMH', $id)
        ->get()->getResult('array');
        return $query;
    }
      // lấy sản phẩm theo danh mục
    public function getproduct($id) {
        $query = $this->db->table($this->table)
        ->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')
        ->where('sanpham.MaMH', $id)
        ->get()->getResult('array');
        return $query;
    }
    // đếm số lượng sản phẩm theo danh mục
    public function countproduct($id) {
     
        $query = 'SELECT * FROM sanpham,dmsanpham
         where sanpham.MaDM = dmsanpham.MaDM and sanpham.MaDM = ? ;';
       return   $this->db->query($query, $id)->getNumRows();
    }
  // lấy giá lớn nhất trong các sản phẩm 
    public function productpricemax($id) {
     
        $query = 'SELECT max(sanpham.GiaBan) FROM sanpham,dmsanpham
         where sanpham.MaDM = dmsanpham.MaDM and sanpham.MaDM = ? ;';
       return   $this->db->query($query, $id)->getResult('array');
    }
      // lấy giá nhỏ nhất trong các sản phẩm 
    public function productpricemin($id) {
     
        $query = 'SELECT min(sanpham.GiaBan) FROM sanpham,dmsanpham
         where sanpham.MaDM = dmsanpham.MaDM and sanpham.MaDM = ? ;';
       return   $this->db->query($query, $id)->getResult('array');
    }
    //  lấy tên danh mục theo danh mục
    public function getCategory_Products($id) {
        $this->builder()->where('MaDM', $id);
        return $this; 
    }

    // lấy các sản phẩm trong khoảng giá bán, trong danh mục
    public function getCategory_Products_price($id, $from, $to) {
        $this->builder() ->join('dmsanpham', 'sanpham.MaDM = dmsanpham.MaDM')
        ->where('dmsanpham.MaDM', $id)
        ->where('sanpham.GiaBan >=', $from)
        ->where('sanpham.GiaBan <=', $to);
        return $this; 
    }
// đếm các sản phẩm trong khoảng giá bán, trong danh mục
    public function getCategory_Products_price_count($id, $from, $to) {
        $query = 'SELECT * FROM sanpham,dmsanpham
        where sanpham.MaDM = dmsanpham.MaDM and sanpham.MaDM = ? and sanpham.GiaBan between ? and ?;';
        return $this->db->query($query, [$id,$from, $to ])->getNumRows();
    }

    // lấy các sản phẩm the từ khóa tìm kiếm
    public function getkey($key){
        $this->builder()->like('TenMH', $key);
        return $this; 
    }
    // lấy giá lớn nhất các sản phẩm ở trang chủ
    public function productpricemax_home() {
     
        $query = 'SELECT max(sanpham.GiaBan) FROM sanpham;';
       return   $this->db->query($query)->getResult('array');
    }
     // lấy giá nhỏ nhất các sản phẩm ở trang chủ
    public function productpricemin_home() {
     
        $query = 'SELECT min(sanpham.GiaBan) FROM sanpham;';
        return   $this->db->query($query)->getResult('array');
    }

    // lấy các sản phẩm trong khoảng giá ở trang chủ
    public function getCategory_Products_price_home($from, $to) {
        $this->builder()
        ->where('sanpham.GiaBan >=', $from)
        ->where('sanpham.GiaBan <=', $to);
        return $this; 
    }

  // đếm số lượng sản phẩm trong khoảng giá ở trang chủ
    public function getCategory_Products_price_count_home($from, $to) {
        $query = 'SELECT * FROM sanpham
        where sanpham.GiaBan between ? and ?;';
        return $this->db->query($query, [$from, $to ])->getNumRows();
    }
   
}