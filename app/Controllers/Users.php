<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;


class Users extends BaseController {
 private $userModel;

    function __construct(){
        $this->userModel = new User();


    }
  
public function showUsers() {
    $data['users'] =$this->userModel->get()->getResult(); 
    echo view('showUsers', $data);
}

public function editUser($id){
 $data['user'] = $this->userModel->where('id',$id)->get()->getResult()[0]; 
  echo view('editUsers',$data);
}

public function saveUser(){
    $id = $this->request->getPost('idUser');
    $newData = [
        'username' => $this->request->getPost('jmeno'),
        'email' => $this->request->getPost('email'),
        'isAdmin' => $this->request->getPost('oprav'),
    ];
    $this->userModel->set($newData)->where('id',$id)->update();

   return redirect()->to('editUsers');
}
}