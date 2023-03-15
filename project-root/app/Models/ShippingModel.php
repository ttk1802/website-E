<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingModel extends Model
{
    protected $table = 'vanchuyen';
    protected $primaryKey = 'MaVC';
    protected $allowedFields = ['Hoten', 'diachi', 'sdt', 'email', 'phuongthuc'];
}