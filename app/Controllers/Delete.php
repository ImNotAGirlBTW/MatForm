<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoadBooks;
use App\Models\Zanr;
use App\Models\Okruh;


class Delete extends BaseController {
 private $BooksModel;
 private $zanrModel;
 private $okruhModel;
    function __construct(){
        $this->BooksModel = new LoadBooks();
        $this->zanrModel = new Zanr();
        $this->okruhModel = new Okruh();
    }

    public function delete($id)
    {
        $entity = $this->BooksModel->where('idKniha',$id)->get()->getResult();
        if($entity){
       $this->BooksModel->where('idKniha',$id)->delete();
       return redirect()->to('edit/books');
    }else{
        echo "PRDEL!";
    }
}

public function delete2($id)
{
    $entity = $this->zanrModel->where('idZanr',$id)->get()->getResult();
    if($entity){
   $this->zanrModel->where('idZanr',$id)->delete();
   return redirect()->to('editCond');
}else{
    echo "PRDEL!";
}
}

public function delete3($id)
{
    $entity = $this->okruhModel->where('idOkruh',$id)->get()->getResult();
    if($entity){
   $this->okruhModel->where('idOkruh',$id)->delete();
   return redirect()->to('editCond');
}else{
    echo "PRDEL!";
}
}
}
