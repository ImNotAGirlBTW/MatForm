<?php

namespace App\Models;

use CodeIgniter\Model;

class Books extends Model {

    protected $table = 'kniha';
    protected $allowedFields = ['Nazev','rokVydani','Autor','idKniha'];
    


}