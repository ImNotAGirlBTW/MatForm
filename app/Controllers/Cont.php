<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;

class Cont extends BaseController
{
    private $dompdf;
    private $booksModel;
    
    function __construct(){
        $this->dompdf = new \Dompdf\Dompdf();
        $this->booksModel = new Books();
    }

    public function getList() {
        return view('listView');
    }

    function getForm() {
        $data['books'] = $this->booksModel->findAll();

        //depricated 
        if($this->request->getMethod() === "post") {
            //vemu data z formulare 
            $values = $this->request->getPost();
            //cyklem projedeme array hodnot id z formy
            $records = array();
            foreach($values as $key=>$val) {
                $id = $key;
                $records[] = $this->booksModel->where('id', $id)->get()->getResult()[0];
            }

            $view = view('listView', ['books' => $records]);
            $this->dompdf->loadHtml($view);

            $this->dompdf->setPaper('A4','portait');
    
            $this->dompdf->render();
    
            $this->dompdf->stream('SnadNeVirus', array("Attachment"=>0));

        }

        return view('formView', $data);
    }
}
