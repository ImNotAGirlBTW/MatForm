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
        $data['books'] = $this->mod->LoadData();
        $data['conditionsJson'] = json_encode($this->mod->loadConditions());
        //depricated 
        if ($this->request->getMethod() === "post") {
            //vemu data z formulare 
            $values = $this->request->getPost();
            //cyklem projedeme array hodnot id z formy
            $records = array();
            foreach ($values as $key => $val) {
                $id = $key;
                $records[] = $this->booksModel->where('idKniha', $id)->get()->getResult()[0];
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
