<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Insert extends BaseController {

    public function uploadData() {
        // Load the necessary models
        $knihaModel = new \App\Models\Books();
        $zanrModel = new \App\Models\Zanr();
        $okruhModel = new \App\Models\Okruh();
    
        // Check if a file was uploaded
        if ($this->request->getFile('excel_file')->isValid()) {
            // Get the uploaded file
            $file = $this->request->getFile('excel_file');
    
            // Load Excel file using PhpSpreadsheet
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getTempName());
    
            // Get the active sheet
            $sheet = $spreadsheet->getActiveSheet();

            // Get all data in the sheet as an array starting from the 16th row
            $allData = $sheet->rangeToArray('D16:' . $sheet->getHighestColumn() . $sheet->getHighestRow(), null, true, true, true);
    
            // Iterate through rows and insert data into the database
            foreach ($allData as $rowData) {
                // Skip empty rows
                if (empty($rowData['D']) || stripos(implode('', $rowData), 'Autor') !== false) {
                    continue;
                }
    
                // Assuming your columns are in order: kniha, autor, idzanr, idokruh
                $kniha = $rowData['E'];
                $autor = $rowData['D'];
                $zanrName = $rowData['F']; // Assuming this is the zanr name
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
            // Handle file upload errors
            $error = $this->request->getFile('excel_file')->getError();
            echo "File upload failed: " . $error;
        }
    }
    

}