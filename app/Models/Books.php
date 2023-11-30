<?php

namespace App\Models;

use CodeIgniter\Model;

class Books extends Model {

    protected $table = 'books';
    protected $allowedFields = ['title','description','author'];

}