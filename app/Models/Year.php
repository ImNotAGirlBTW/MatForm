<?php
namespace App\Models;

use CodeIgniter\Model;

class Year extends Model {

    protected $table = 'skolni_rok';

    protected $allowedFields = [
      'skolni_rok'
    ];
    
}