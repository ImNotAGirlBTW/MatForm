<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoadBooks;
use App\Models\Zanr;
use App\Models\Okruh;

class Edit extends BaseController {
 private $loadBooksModel;
 private $zanrModel;
 private $okruhModel;
    function __construct(){
        $this->loadBooksModel = new LoadBooks();
        $this->zanrModel = new Zanr();
        $this->okruhModel = new Okruh();

    }
  
public function editBooks() {
    $data['books'] =$this->loadBooksModel->LoadData2(); 

    echo view('loadEditBooks', $data);
}

public function editBook($bookId) {
    $data['zanrOptions'] = $this->zanrModel->get()->getResult();
    $data['okruhOptions'] = $this->okruhModel->get()->getResult();
    $data['book'] =$this->loadBooksModel->where('idKniha', $bookId)->get()->getResult()[0];
    echo view('editView', $data);
}

public function saveBook() {
    $bookId = $this->request->getPost('idKniha');
    $newData = [
        'nazev' => $this->request->getPost('nazev'),
        'autor' => $this->request->getPost('autor'),
        'Zanr_idZanr' => $this->request->getPost('zanr'),
        'Okruh_idOkruh' => $this->request->getPost('okruh'),
    ];


   $this->loadBooksModel->updateBook($bookId, $newData); 

    return redirect()->to('/edit/books'); 
}


}
