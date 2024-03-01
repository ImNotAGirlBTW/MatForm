<?php

namespace App\Models;

use CodeIgniter\Model;

class Zanr extends Model {

    protected $table = 'zanr';
    protected $allowedFields = ['idZanr','nazev','popis','pocet'];
    
    public function updateBook($ZanId, $data)
    {
        $this->set($data);
        $this->where('idZanr', $ZanId);
        $this->update();
    }


}