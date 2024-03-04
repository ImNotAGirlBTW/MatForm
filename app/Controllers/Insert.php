<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\LoadBooks;
use App\Models\Zanr;
use App\Models\Okruh;


class Insert extends BaseController {

    private $loadBooksModel;
    private $zanrModel;
    private $okruhModel;

    function __construct(){
        $this->loadBooksModel = new LoadBooks();
        $this->zanrModel = new Zanr();
        $this->okruhModel = new Okruh();

    }

    public function uploadData() {
       
        $knihaModel = new \App\Models\Books();
        $zanrModel = new \App\Models\Zanr();
        $okruhModel = new \App\Models\Okruh();
    
       
        if ($this->request->getFile('excel_file')->isValid()) {
           
            $file = $this->request->getFile('excel_file');
    
            
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getTempName());
    
   
            $sheet = $spreadsheet->getActiveSheet();

           
            $allData = $sheet->rangeToArray('D16:' . $sheet->getHighestColumn() . $sheet->getHighestRow(), null, true, true, true);
    
        
            foreach ($allData as $rowData) {
                
                if (empty($rowData['D']) || stripos(implode('', $rowData), 'Autor') !== false) {
                    continue;
                }
    
               
                $kniha = $rowData['E'];
                $autor = $rowData['D'];
                $zanrName = $rowData['F'];
                $okruhName = $rowData['G'];
    
                $zanrRow = $zanrModel->where('nazev', $zanrName)->first();
            $zanrId = $zanrRow ? $zanrRow['idZanr'] : null;

           
            $okruhRow = $okruhModel->where('nazev', $okruhName)->first();
            $okruhId = $okruhRow ? $okruhRow['idOkruh'] : null;
         
            $knihaModel->save([
                'nazev' => $kniha,
                'autor' => $autor,
                'Zanr_idZanr' => $zanrId,
                'Okruh_idOkruh' => $okruhId,
            ]);
            }
        } else {
            
            $error = $this->request->getFile('excel_file')->getError();
            echo "File upload failed: " . $error;
        }
    }
    
    public function showCondForm()
    {
        $data['zanrOptions'] = $this->zanrModel->findAll();
        $data['okruhOptions'] = $this->okruhModel->findAll();
        return view('condForm',$data);
    }

    public function addCond()
    {
        $cond = $this->request->getPost('podm');
        $nazev = $this->request->getPost('nazev');
        $popis = $this->request->getPost('popis');
        $pocet = $this->request->getPost('pocet');

    if($cond == 0){
        $existingRecord = $this->zanrModel->where('nazev', $nazev)->first();

        if ($existingRecord) {
            echo "Už to existuje blbečku!";
        } else {
            $zanrData = [
                'nazev' => $nazev,
                'popis' => $popis,
                'pocet' => $pocet,
            ];

            $this->zanrModel->insert($zanrData);

            return redirect()->to('insertCond');
        }
    }else{

        $existingRecord = $this->okruhModel->where('nazev', $nazev)->first();

        if ($existingRecord) {
            echo "Už to existuje blbečku!";
        } else {
            $okruhData = [
                'nazev' => $nazev,
                'popis' => $popis,
                'pocet' => $pocet,
            ];

            $this->okruhModel->insert($okruhData);

            return redirect()->to('insertCond');
        }

    }
    }

    }

