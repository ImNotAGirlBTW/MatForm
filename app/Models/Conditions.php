<?php

namespace App\Models;

use CodeIgniter\Model;

class Conditions extends Model {
    protected $table = 'okruh';

    public function loadConditions()
    {
        $this->table('okruh');

        $this->select('*, nazev as okruh, pocet as oPocet');
        
        $okruhData = $this->findAll();
    
        $zanrModel = new Zanr(); 
        
        $zanrData = $zanrModel->select('*, nazev as zanr, pocet as zPocet')->findAll();
    
        $mergedData = array_merge($okruhData, $zanrData);
    
        return $mergedData;
    }
}