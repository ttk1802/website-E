<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model
{
    protected $table = 'theodoi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email'];
}