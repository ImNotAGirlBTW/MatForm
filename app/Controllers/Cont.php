<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;
use App\Models\Conditions;
use App\Models\Conditions2;
use  App\Models\LoadBooks;
use App\Models\Okruh;
use App\Models\User;
use  App\Models\Zanr;
use App\Models\SaveMod;
use App\Models\Year;
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPUnit\Framework\Constraint\IsEmpty;

use function GuzzleHttp\json_decode;
use function PHPUnit\Framework\isEmpty;

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
    private $saveMod;
    private $yearMod;
    private $userMod;
    private $user;

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
        $this->saveMod = new SaveMod();
        $this->userMod = new User();
        $this->yearMod = new Year();

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
        $this->user = session()->get('user');
        // $data['books'] = $this->booksModel->findAll();
       // $data['books'] = $this->mod->LoadData();

        $data['user'] = session()->get('user');
        $data['group'] = session()->get('userGroup');
        $data['books'] = $this->LoadModel->LoadData();
        $data['conditionsJson'] = json_encode($this->condModel->loadConditions());
        $data['LengthJson'] = json_encode($this->condModel2->findAll());
        $data['conditions2'] = $this->condModel2->findAll();
        $data['conditions'] = $this->condModel->loadConditions();
        $data['okruh'] = $this->okruhModel->FindAll();
        $data['zanr'] = $this->zanrModel->FindAll();
        $data['year'] = $this->yearMod->get()->getResult()[0];


        $data['navbar'] = '   <nav class="navbar navbar-expand-lg bg-light">
                        <div class="container-fluid">
                          <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                              <li class="nav-item">
                                <a class="nav-link" href="'. base_url("/") .'">Formulář</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="' .base_url("edit/books").'">Díla</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="'. base_url("editCond").'">Podmínky</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="'. base_url("editUsers").'">Uživatelé</a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Vložení
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="'. base_url("insert") .'">Dílo</a></li>
                                  <li><a class="dropdown-item" href="'. base_url("insertView").'">Excel</a></li>
                                  <li><a class="dropdown-item" href="'. base_url("insertCond").'">Žánr</a></li>
                                  <li><a class="dropdown-item" href="'. base_url("insertCond2").'">Okruh</a></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                          <ul class="navbar-nav d-flex mb-2 mb-lg-0">
                            <li class="nav-item" style="padding-right: 10px;">
                              <a class="nav-link" href="'. base_url('logout') .'">Odhlásit se</a>
                            </li>
                          </ul>
                        </div>
                      </nav>';

        if($this->user){
            $data['checkboxID'] =json_encode($this->saveMod->where('Users_idUsers',$this->user['id'])->get()->getResult());
        }else{
            $data['checkboxID'] = json_encode('');
        }
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
        if(isset($this->user))
        {
       
            $existingData = $this->saveMod->where('Users_idUsers',$this->user['id'])->get()->getResult();
            if(!empty($existingData)){
            $this->saveMod->where('Users_idUsers', $this->user['id'])->delete();
            }
            $saveData = array();
            foreach ($values as $key => $val) {
                $id = $key;
                $saveData[] = [
                    'Users_idUsers' => $this->user['id'],
                    'Kniha_idKniha' => $id,
                    'Datum' => date('Y-m-d'),
                ];
            }
            $this->saveMod->insertBatch($saveData);
        
        }
          

            
                $view = view('listView', ['books' => $records, 'user' => $data['user'], 'group' => $data['group'], 'okruh' => $data['okruh'], 'year' => $data['year'], 'zanr' => $data['zanr']]);
                $this->dompdf->loadHtml($view);

                $this->dompdf->setPaper('A4', 'portait');

                $this->dompdf->render();

                $this->dompdf->stream('SnadNeVirus', array("Attachment" => 0));
       
        }

        return view('formView', $data);
    }

    public function allBooksPdf(){
      $data['books'] = $this->booksModel->select('*,okruh.nazev as okruh')->join('okruh','okruh.idokruh=kniha.Okruh_idOKruh')->findAll();
      $data['zanr'] = $this->zanrModel->FindAll();
      $data['okruh'] = $this->okruhModel->findAll();
      $data['year'] = $this->yearMod->get()->getResult()[0];
      $view = view('pdfBooks',$data);
      $this->dompdf->loadHtml($view);

      $this->dompdf->setPaper('A4', 'portait');

      $this->dompdf->render();

      $this->dompdf->stream('SnadNeVirus', array("Attachment" => 0));
    }
}
