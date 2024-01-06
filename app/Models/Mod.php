<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod extends Model
{
    var $db;
    function __construct(){
        $this->db = \Config\Database::connect();
    }
/** 
   function poadData()
    {
$builder = $this->db->table('kniha'); 
$builder->distinct('kniha.idKniha');
$builder->select('kniha.Nazev,kniha.RokVydani,kniha.Autor,kniha.idKniha,
kniha_podminky.Kniha_idKniha,kniha_podminky.Podminky_idPodminky,podminky.idPodminky,
 podminky.okruh,podminky.PozadovanyPocet,podminky.Popis'); 
$builder->join('kniha_podminky','kniha_podminky.Kniha_idKniha = kniha.idKniha');
$builder->join('podminky','kniha_podminky.Podminky_idPodminky =podminky.idPodminky');
$builder->orderBy('kniha_podminky.Podminky_idPodminky','ASC');
$data = $builder->get()->getResult();
return $data;
    }
*/
    function LoadData(){
        $builder = $this->db->table('kniha');

        $builder->select('*,okruh.nazev as okruh,okruh.pocet as oPocet,zanr.nazev as zanr,zanr.pocet as zPocet');
        $builder->join('okruh','idOkruh=Okruh_idOkruh');
        $builder->join('zanr','idZanr=Zanr_idZanr');
        $builder->orderBy('idZanr');
        $data = $builder->get()->getResult();
        return $data;


    }

    function loadConditions()
    {
        $builder = $this->db->table('okruh');
        $builder->select('*');
        $builder->orderBy('idOkruh');
        $builder->join('zanr','idZanr=idOkruh','left');
        $data = $builder->get()->getResult();
        return $data;
    }
function getSelBooks($id){
    $builder = $this->db->table('kniha');
    $builder = $this->db->table('kniha'); 
$builder->distinct('kniha.idKniha');
$builder->select('kniha.Nazev,kniha.RokVydani,kniha.Autor,kniha.idKniha,
kniha_podminky.Kniha_idKniha,kniha_podminky.Podminky_idPodminky,podminky.idPodminky,
 podminky.okruh,podminky.PozadovanyPocet'); 
$builder->join('kniha_podminky','kniha_podminky.Kniha_idKniha = kniha.idKniha');
$builder->join('podminky','kniha_podminky.Podminky_idPodminky =podminky.idPodminky');
$builder->orderBy('kniha_podminky.Podminky_idPodminky','ASC');
$data = $builder->where('idKniha', $id)->get()->getResult()[0];
   return $data;
}
    
}
