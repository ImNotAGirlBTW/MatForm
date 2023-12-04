<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;

class Cont extends BaseController
{
    private $dompdf;
    private $booksModel;
    private $mod;
    function __construct()
    {
        $this->dompdf = new \Dompdf\Dompdf();
        $this->booksModel = new Books();
        $this->mod = new \App\Models\Mod;
    }

    public function getList()
    {
        return view('listView');
    }

    function getForm()
    {
        // $data['books'] = $this->booksModel->findAll();
        $data['books'] = $this->mod->loadData();
        $data['conditions'] = $this->mod->loadConditions();
        //depricated 
        if ($this->request->getMethod() === "post") {
            //vemu data z formulare 
            $values = $this->request->getPost();
            //cyklem projedeme array hodnot id z formy
            $records = array();
            foreach ($values as $key => $val) {
                $id = $key;
                //$records[] = $this->booksModel->where('idKniha', $id)->get()->getResult()[0];
                $records[] = $this->mod->getSelBooks($id);
            }
            $count = array();
            foreach ($data['conditions'] as $cond) {
                $count[] =  $cond->PozadovanyPocet;
            }



            $DRA_Knihy = 0;
            $PRO_Knihy = 0;
            $POE_Knihy = 0;
            foreach ($records as $book) {
                switch ($book->okruh) {
                    case 'DRA':
                        $DRA_Knihy++;
                        break;
                    case 'PRO':
                        $PRO_Knihy++;
                        break;
                    case 'POE':
                        $POE_Knihy++;
                        break;
                }
            }

            if (sizeOf($records) >= 1 /*$count[7]*/ && $DRA_Knihy >= $count[0] && $PRO_Knihy >= $count[1] && $POE_Knihy >= $count[2]) {
                $view = view('listView', ['books' => $records]);
                $this->dompdf->loadHtml($view);

                $this->dompdf->setPaper('A4', 'portait');

                $this->dompdf->render();

                $this->dompdf->stream('SnadNeVirus', array("Attachment" => 0));
            } else {
            }
        }

        return view('formView', $data);
    }
}
