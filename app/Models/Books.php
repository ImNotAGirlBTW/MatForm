<?php

namespace App\Models;

use CodeIgniter\Model;

class Books extends Model {

    protected $table = 'kniha';
    protected $allowedFields = ['nazev','autor','idKniha','Zanr_idZanr','Okruh_idOkruh'];
    


}