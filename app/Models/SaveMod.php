<?php

namespace App\Models;

use CodeIgniter\Model;

class SaveMod extends Model {

    protected $table = 'save';

    protected $allowedFields = [
        'Datum',
        'Users_idUsers',
        'Kniha_idKniha',
    ];
    
}