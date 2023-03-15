<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'dmsanpham';
    protected $primaryKey = 'MaDM';
    protected $allowedFields = ['TenDM', 'slug'];
    public function getCategory_name($id) {     
        $query = $this->db->table($this->table)->select('TenDM')
        ->where('MaDM', $id)
        ->get()->getResult('array');
        return $query;
    }
}