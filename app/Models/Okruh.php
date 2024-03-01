<?php

namespace App\Models;

use CodeIgniter\Model;

class Okruh extends Model {

    protected $table = 'okruh';
    protected $allowedFields = ['idOkruh','nazev','popis','pocet'];
    
    public function updateBook($OkruhId, $data)
    {
        $this->set($data);
        $this->where('idOkruh', $OkruhId);
        $this->update();
    }


}