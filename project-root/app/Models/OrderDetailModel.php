<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'ct_dathang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['MaDH', 'MaMH', 'SL'];
    public function getOrders_detail($id) {
        return $this->db->table($this->table)
        ->join('dathang', 'dathang.MaDH = ct_dathang.MaDH')
        ->join('sanpham', 'ct_dathang.MaMH = sanpham.MaMH')
        ->where('dathang.id', $id)
        ->get()->getResult('array');
    }
    public function DeleteOrders_detail($MaDH) {    
        $this->db->table($this->table)->where('MaDH', $MaDH)->delete();     
    }
}