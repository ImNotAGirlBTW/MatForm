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
public function loadChar(){
    $data['zanrOptions'] = $this->zanrModel->get()->getResult();
    $data['okruhOptions'] = $this->okruhModel->get()->getResult();
    echo view('editCondview',$data);
}

public function EditChar($id){
    $data['zanrOptions'] = $this->zanrModel->where('idZanr', $id)->get()->getResult();
    echo view('editCond',$data);
}

public function saveChar(){

    $ZanrId = $this->request->getPost('zanrID');
    $newZanData = [
        'nazev' => $this->request->getPost('zanr'),
        'pocet' => $this->request->getPost('zPocet'),
        'idZanr' => $this->request->getPost('zanrID'),
        'popis' => $this->request->getPost('zPopis'),
    ];
    $this->zanrModel->updateBook($ZanrId, $newZanData); 
    return redirect()->to('editCond'); 
}


public function EditOkruh($id){
    $data['okruhOptions'] = $this->okruhModel->where('idOkruh', $id)->get()->getResult();
    echo view('editOkruh',$data);
}

public function saveOkruh(){

    $OkruhID = $this->request->getPost('okruhID');
    $newOkrData = [
        'nazev' => $this->request->getPost('okruh'),
        'pocet' => $this->request->getPost('oPocet'),
        'idOkruh' => $this->request->getPost('okruhID'),
        'popis' => $this->request->getPost('oPopis'),
    ];
  $this->okruhModel->updateBook($OkruhID, $newOkrData); 
    return redirect()->to('editCond'); 
}


}
