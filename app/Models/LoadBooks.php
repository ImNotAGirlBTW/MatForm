<?php

namespace App\Models;

use CodeIgniter\Model;

class LoadBooks extends Model
{

    protected $table = 'kniha';

    public function LoadData()
    {
        $this->join('okruh', 'kniha.Okruh_idOkruh=okruh.idOkruh');
        $this->join('zanr', 'kniha.Zanr_idZanr=zanr.idZanr');
        $this->select('*, okruh.nazev as okruh, okruh.pocet as oPocet, zanr.nazev as zanr, zanr.pocet as zPocet');
        $this->orderBy('idOkruh');
        $data = $this->get()->getResult();
        return $data;
    }
}
