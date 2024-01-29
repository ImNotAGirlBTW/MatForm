<?php

namespace App\Models;

use CodeIgniter\Model;

class Okruh extends Model {

    protected $table = 'okruh';
    protected $allowedFields = ['idOkruh','nazev','Popis','pocet'];
    


}