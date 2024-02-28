<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoadBooks;


class Delete extends BaseController {
 private $BooksModel;
    function __construct(){
        $this->BooksModel = new LoadBooks();
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
}
