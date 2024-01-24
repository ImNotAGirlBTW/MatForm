<?php

namespace App\Models;

use CodeIgniter\Model;

class Conditions extends Model {
    protected $table = 'okruh';

    public function loadConditions()

    {
        // Assuming you have relationships defined in the model
        $this->join('zanr', 'zanr.idZanr = okruh.idOkruh', 'left');
        // Selecting necessary columns
        $this->select('*, zanr.nazev as zanr, zanr.pocet as zPocet, okruh.nazev as okruh, okruh.pocet as oPocet');
        
        // Ordering by idOkruh (adjust if needed)
        $this->orderBy('okruh.idOkruh');

        // Getting the result
        $data = $this->findAll();

        return $data;
    }

    public function  loadConditions2(){
        $this->table('podminky'); 
        $this->select('popis,pocet');
        $data = $this->findAll();
        
        return $data;
    }
}