<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;

class Insert2 extends BaseController {

    public function insertBook() {
        $bookName = $this->request->getPost('nazev');
        $zanr = $this->request->getPost('zanr');
        $okruh = $this->request->getPost('okruh');
        $autor = $this->request->getPost('autor');

        $bookModel = new Books(); 
        $existingBook = $bookModel->where('nazev', $bookName)->first();

        if ($existingBook) {
            echo "Dílo již existuje v záznamu";
        } else {
            $bookData = [
                'nazev' => $bookName,
                'Zanr_idZanr' => $zanr,
                'Okruh_idOkruh' => $okruh,
                'autor' => $autor,
            ];

            $bookModel->insert($bookData);

            return redirect()->to('insert');
        }
    }

    
        
}

