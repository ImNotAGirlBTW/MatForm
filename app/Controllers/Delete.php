<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoadBooks;
use App\Models\Zanr;
use App\Models\Okruh;
use App\Models\User;
use App\Models\SaveMod;


class Delete extends BaseController
{
    private $BooksModel;
    private $zanrModel;
    private $okruhModel;
    private $userModel;
    private $saveModel;
    function __construct()
    {
        $this->BooksModel = new LoadBooks();
        $this->zanrModel = new Zanr();
        $this->okruhModel = new Okruh();
        $this->userModel = new User();
        $this->saveModel = new SaveMod();
    }

    public function delete($id)
    {
        $entity = $this->BooksModel->where('idKniha', $id)->get()->getResult();
        if ($entity) {
            $this->BooksModel->where('idKniha', $id)->delete();
            return redirect()->to('edit/books');
        } else {
            echo "Něco se nepovedlo!!";
        }
    }

    public function delete2($id)
    {
        $entity = $this->zanrModel->where('idZanr', $id)->get()->getResult();
        if ($entity) {
            $this->zanrModel->where('idZanr', $id)->delete();
            return redirect()->to('editCond');
        } else {
            echo "Něco se nepovedlo!";
        }
    }

    public function delete3($id)
    {
        $entity = $this->okruhModel->where('idOkruh', $id)->get()->getResult();
        if ($entity) {
            $this->okruhModel->where('idOkruh', $id)->delete();
            return redirect()->to('editCond');
        } else {
            echo "Něco se nepovedlo!";
        }
    }

        public function deleteUser($id)
    {
        $entity = $this->userModel->where('id', $id)->get()->getResult();
        $entitySave =  $this->saveModel->where('Users_idUsers', $id)->get()->getResult();

        if($entitySave){
            $this->saveModel->where('Users_idUsers',$id)->delete();
        }
        if ($entity) {
            $this->userModel->where('id', $id)->delete();
            return redirect()->to('editUsers');
        } else {
            echo "Něco se nepovedlo!";
        }
    }
    
}
