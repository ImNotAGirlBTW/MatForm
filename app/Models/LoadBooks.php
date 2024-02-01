<?php

namespace App\Models;

use CodeIgniter\Model;

class LoadBooks extends Model
{

    protected $table = 'kniha';
    protected $allowedFields = ['nazev','autor','idKniha','Zanr_idZanr','Okruh_idOkruh'];

    public function LoadData()
    {
        $this->join('okruh', 'kniha.Okruh_idOkruh=okruh.idOkruh');
        $this->join('zanr', 'kniha.Zanr_idZanr=zanr.idZanr');
        $this->select('*, okruh.nazev as okruh, okruh.pocet as oPocet, zanr.nazev as zanr, zanr.pocet as zPocet, kniha.nazev as kniha');
        $this->orderBy('idOkruh');
        $data = $this->get()->getResult();
        return $data;
    }

    public function LoadData2()
    {
        $this->join('okruh', 'kniha.Okruh_idOkruh=okruh.idOkruh');
        $this->join('zanr', 'kniha.Zanr_idZanr=zanr.idZanr');
        $this->select('*, okruh.nazev as okruh, zanr.nazev as zanr, kniha.nazev as kniha,kniha.idKniha');
        $this->orderBy('idKniha');
        $data = $this->get()->getResult();
        return $data;
    }

    public function updateBook($bookId, $data)
    {
        $this->set($data);
        $this->where('idKniha', $bookId);
        $this->update();
    }
}
