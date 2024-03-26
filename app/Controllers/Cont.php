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

  public function showInsertForm()
  {

    $data['zanrOptions'] = $this->zanrModel->findAll();
    $data['okruhOptions'] = $this->okruhModel->findAll();

    echo view('insertView2', $data);
  }

  function getForm()
  {
    $this->user = session()->get('user');
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


    if ($this->user) {
      $data['checkboxID'] = json_encode($this->saveMod->where('Users_idUsers', $this->user['id'])->get()->getResult());
    } else {
      $data['checkboxID'] = json_encode('');
    }

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
      }
      if (isset($this->user)) {

        $existingData = $this->saveMod->where('Users_idUsers', $this->user['id'])->get()->getResult();
        if (!empty($existingData)) {
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

  public function allBooksPdf()
  {
    $data['books'] = $this->booksModel->select('*,kniha.nazev as dilo,okruh.nazev as okruh')->join('okruh', 'okruh.idOkruh=kniha.Okruh_idOKruh')->findAll();
    $data['zanr'] = $this->zanrModel->FindAll();
    $data['okruh'] = $this->okruhModel->findAll();
    $data['year'] = $this->yearMod->get()->getResult()[0];


    $view = view('pdfBooks', ['books' => $data['books'], 'zanr' => $data['zanr'], 'okruh' => $data['okruh'], 'year' => $data['year']]);

    $this->dompdf->loadHtml($view);

    $this->dompdf->setPaper('A4', 'portait');

    $this->dompdf->render();

    $this->dompdf->stream('SnadNeVirus', array("Attachment" => 0));
  }
}
