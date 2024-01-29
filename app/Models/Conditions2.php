<?php

namespace App\Models;

use CodeIgniter\Model;

class Conditions2 extends Model
{
    protected $table = 'podminky';
    protected $allowedFields = ['popis','pocet'];

}
