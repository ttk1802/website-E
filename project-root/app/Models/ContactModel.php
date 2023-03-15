<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'lienhe';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'subject', 'message'];
}