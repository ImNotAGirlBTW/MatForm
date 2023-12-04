<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod extends Model
{
    var $db;
    function __construct(){
        $this->db = \Config\Database::connect();
    }

   function loadData()
    {
$builder = $this->db->table('kniha'); 
$builder->distinct('kniha.idKniha');
$builder->select('kniha.Nazev,kniha.RokVydani,kniha.Autor,kniha.idKniha,
kniha_podminky.Kniha_idKniha,kniha_podminky.Podminky_idPodminky,podminky.idPodminky,
 podminky.okruh,podminky.PozadovanyPocet'); 
$builder->join('kniha_podminky','kniha_podminky.Kniha_idKniha = kniha.idKniha');
$builder->join('podminky','kniha_podminky.Podminky_idPodminky =podminky.idPodminky');
$builder->orderBy('kniha_podminky.Podminky_idPodminky','ASC');
$data = $builder->get()->getResult();
return $data;
    }

    function loadConditions()
    {
        $builder = $this->db->table('podminky');
        $builder->select('Popis,okruh,PozadovanyPocet');
        $builder->orderBy('idPodminky','ASC');
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
