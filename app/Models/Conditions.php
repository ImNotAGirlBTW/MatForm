<?php

namespace App\Models;

use CodeIgniter\Model;

class Conditions extends Model {
    protected $table = 'okruh';

    public function loadConditions()
    {
        // Retrieve data from the 'okruh' table
        $this->table('okruh');
        $this->select('*, nazev as okruh, pocet as oPocet');
        $okruhData = $this->findAll();
    
        // Retrieve data from the 'zanr' table
        $zanrModel = new Zanr(); // Assuming the model for 'zanr' is ZanrModel
        
        $zanrData = $zanrModel->select('*, nazev as zanr, pocet as zPocet')->findAll();
    
        // Merge the results
        $mergedData = array_merge($okruhData, $zanrData);
    
        return $mergedData;
    }
}