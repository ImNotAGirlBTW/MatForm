<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Auth extends BaseConfig
{
    public $azure = [
        'clientId'     => '',
        'clientSecret' => '',
        'redirectUri'  => 'REDIRECT_URI',
        'authority'    => '',
    ];
}