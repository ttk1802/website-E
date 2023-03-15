<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $allowedFields = ['hotendem', 'ten', 'dienthoai', 'email', 'matkhau', 'quyen'];
}