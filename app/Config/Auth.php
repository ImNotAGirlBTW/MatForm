<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Auth extends BaseConfig
{
    public $azure = [
        'clientId'     => '3d16f475-60ec-4d9e-afed-88b1b44e5c7f',
        'clientSecret' => 'eaca82db-ffa6-465e-8e2f-d25fa27b5b7a',
        'redirectUri'  => 'REDIRECT_URI',
        'authority'    => 'f9e9eee3-6c9a-4068-a89c-6d96a10f21b9',
    ];
}