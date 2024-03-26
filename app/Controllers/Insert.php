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

           
            $allData = $sheet->rangeToArray('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow(), null, true, true, true);
    
        
            foreach ($allData as $rowData) {
                
                if (empty($rowData['A']) || stripos(implode('', $rowData), 'Autor') !== false) {
                    continue;
                }
    
               
                $kniha = $rowData['A'];
                $autor = $rowData['B'];
                $zanrName = $rowData['C'];
                $okruhName = $rowData['D'];

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

            return redirect()->to('edit/books');
        } else {
            
            $error = $this->request->getFile('excel_file')->getError();
            echo "Nahrání souboru se nepovedlo: " . $error;
        }
    }
    
    public function showCondForm()
    {
        $data['zanrOptions'] = $this->zanrModel->findAll();
        return view('condForm',$data);
    }

    public function showCondForm2()
    {
        $data['okruhOptions'] = $this->okruhModel->findAll();
        return view('condForm2',$data);
    }

    public function addCond()
    {
        $nazev = $this->request->getPost('nazev');
        $popis = $this->request->getPost('popis');
        $pocet = $this->request->getPost('pocet');

        $existingRecord = $this->zanrModel->where('nazev', $nazev)->first();

        if ($existingRecord) {
        echo "Záznam již existuje";
        }else{
            $zanrData = [
                'nazev' => $nazev,
                'popis' => $popis,
                'pocet' => $pocet,
            ];
            var_dump($zanrData);
            die;
           // $this->zanrModel->insert($zanrData);
          //  return redirect()->to('insertCond');
        }
    }

    public function addCond2()
    {

        $nazev = $this->request->getPost('nazev');
        $popis = $this->request->getPost('popis');
        $pocet = $this->request->getPost('pocet');

        $existingRecord = $this->okruhModel->where('nazev', $nazev)->first();

        if ($existingRecord) {
            echo "Záznam už existuje";
        } else {
            $okruhData = [
                'nazev' => $nazev,
                'popis' => $popis,
                'pocet' => $pocet,
            ];

            $this->okruhModel->insert($okruhData);

            return redirect()->to('insertCond2');
        }


    }
    }

    

