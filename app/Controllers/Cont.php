<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;
use App\Models\Conditions;
use App\Models\Conditions2;
use  App\Models\LoadBooks;
use App\Models\Okruh;
use  App\Models\Zanr;
use Dompdf\Dompdf;
use Dompdf\Options;

class Cont extends BaseController
{
    private $dompdf;
    private $booksModel;
   // private $mod;
    private $condModel;
    private $condModel2;
    private $LoadModel;
    private $okruhModel;
    private $zanrModel;
    function __construct()
    {
       // $this->dompdf = new \Dompdf\Dompdf(array('enable_remote' => true));
        $this->booksModel = new Books();
        $this->condModel = new Conditions();
        $this->condModel2 = new Conditions2();
     //   $this->mod = new \App\Models\Mod;
        $this->LoadModel = new LoadBooks();
        $this->okruhModel = new Okruh();
        $this->zanrModel = new Zanr();

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$this->dompdf = new Dompdf($options);
    }

    public function getList()
    {
        return view('listView');
    }

    public function insertView()
    {
        return view('insertView');
    }

    public function showInsertForm() {

        $data['zanrOptions'] = $this->zanrModel->findAll();
        $data['okruhOptions'] = $this->okruhModel->findAll();

        echo view('insertView2', $data);
    }

    function getForm()
    {
        // $data['books'] = $this->booksModel->findAll();
       // $data['books'] = $this->mod->LoadData();

        $data['books'] = $this->LoadModel->LoadData();
        $data['conditionsJson'] = json_encode($this->condModel->loadConditions());
        $data['LengthJson'] = json_encode($this->condModel2->findAll());
        $data['conditions2'] = $this->condModel2->findAll();
        $data['conditions'] = $this->condModel->loadConditions();
        $data['okruh'] = $this->okruhModel->FindAll();
        $data['zanr'] = $this->zanrModel->FindAll();
        //depricated 
        if ($this->request->getMethod() === "post") {
            $values = $this->request->getPost();
            $records = array();
            foreach ($values as $key => $val) {
                $id = $key;
                $records[] = $this->booksModel
    ->select('kniha.*, okruh.nazev as okruh, zanr.nazev as zanr')
    ->join('okruh', 'okruh.idOkruh = kniha.Okruh_idOkruh', 'inner')
    ->join('zanr', 'zanr.idZanr = kniha.Zanr_idZanr', 'inner')
    ->where('kniha.idKniha', $id)
    ->orderBy('okruh,kniha.nazev')
    ->get()
    ->getResult()[0];
               // $records[] = $this->mod->getSelBooks($id);
            }
       



          

            
                $view = view('listView', ['books' => $records]);
                $this->dompdf->loadHtml($view);

                $this->dompdf->setPaper('A4', 'portait');

                $this->dompdf->render();

                $this->dompdf->stream('SnadNeVirus', array("Attachment" => 0));
       
        }

        return view('formView', $data);
    }
}
