<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'danhgia';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'comment', 'status', 'product_id', 'date_created'];

    public function getComment($id) {
        $query = $this->db->table($this->table)
        ->join('sanpham', 'danhgia.product_id = sanpham.MaMH')
        ->where('sanpham.MaMH', $id)
        ->where('danhgia.status', 0)
        ->get()->getResult('array');
        return $query;
    }
}