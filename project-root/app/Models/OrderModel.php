<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'dathang';
    protected $primaryKey = 'id ';
    protected $allowedFields = ['MaDH', 'status', 'MaVC'];
    public function getOrders() {
        return $this->db->table($this->table)->join('vanchuyen', 'dathang.MaVC = vanchuyen.MaVC')->get()->getResult('array');
    }

}