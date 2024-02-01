<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Insert extends BaseController {

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
    

}