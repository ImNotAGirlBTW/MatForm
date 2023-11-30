<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cont extends BaseController
{

    function __construct(){
        $this->dompdf = new \Dompdf\Dompdf();
    }
    public function getList() {
        // $value1 and $value2 will contain the checked values
        // Implement your redirect logic or other processing here
        echo view('listView');
    }


    function getForm()
    {
        $data["button"] = 
        '<form action="'. base_url('makePDF').'">
        <button type="submit">Vytvoř PDF</button>
        </form>';
      //  $data["seznam"] = $this->mod->loadData();   
        echo view('formView',$data);
    }

    public function genPdf() {

        if ($this->request->isAJAX()) {
            $data = $this->request->getPost('data');

            
        }

        //
        //return json_encode(['message'=>'Success!']);
    }
    
    public function CreatePDF(){
        $html = view('formView');
          
       $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4','portait');

        $this->dompdf->render();

        $this->dompdf->stream('SnadNeVirus', array("Attachment"=>0));
    }
}
