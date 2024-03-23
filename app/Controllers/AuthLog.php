<?php

namespace App\Controllers;





use CodeIgniter\Controller;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Config\Auth;
use App\Models\User;
use Config\SessionLogin;
use GuzzleHttp\Exception\GuzzleException;
use Microsoft\Graph\Exception\GraphException;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\User as ModelUser;
use App\Models\SaveMod;

class AuthLog extends Controller
{
    private $config;
    function __construct()
    {
        $this->config = new Auth();    
    }


    public function login()
    {
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => $this->config->azure['clientId'],
            'clientSecret'            => $this->config->azure['clientSecret'],
            'redirectUri'             => base_url('callback'),
            'urlAuthorize'            => 'https://login.microsoftonline.com/'.$this->config->azure['authority'].'/oauth2/v2.0/authorize',
            'urlAccessToken'          => 'https://login.microsoftonline.com/'.$this->config->azure['authority'].'/oauth2/v2.0/token',
            'urlResourceOwnerDetails' => '',
            'scopes'                  => 'user.read'
            
        ]);
     
        $authorizationUrl = $provider->getAuthorizationUrl();

        $session = session();
        $session->set('oauth2state', $provider->getState());
      
        return redirect()->to($authorizationUrl);
    }


    public function callback()
    {
        $session = \Config\Services::session();

        $token = $session->get('oauth2state');
        if (empty($_GET['state']) || ($_GET['state'] !== $token)) {
            $session->remove('oauth2state');
            exit('Invalid state');
        }

        $code = $_GET['code'];
        if (isset($code)) {
            $provider = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => $this->config->azure['clientId'],
                'clientSecret'            => $this->config->azure['clientSecret'],
                'redirectUri'             => base_url('callback'),
                'urlAuthorize'            => 'https://login.microsoftonline.com/'.$this->config->azure['authority'].'/oauth2/v2.0/authorize',
                'urlAccessToken'          => 'https://login.microsoftonline.com/'.$this->config->azure['authority'].'/oauth2/v2.0/token',
                'urlResourceOwnerDetails' => '',
                'scopes'                  => 'user.read'
                
            ]);

            try {
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $code,
                ]);
        
                $graph = new Graph();
                $graph->setAccessToken($accessToken->getToken());
                
                /** @var ModelUser $userModel */
                $userModel = $graph->createRequest('GET', '/me')
                    ->setReturnType(ModelUser::class)
                    ->execute();
                    
                $existingUser = (new User())->where('email', $userModel->getMail())->first();
                $group = $userModel->getJobTitle();
                if ($existingUser) {
                    $session->set('user', $existingUser);
                    $session->set('userGroup', $group);

                    // User exists, check if the user is an admin
                    $isAdmin = (int) $existingUser['isAdmin'];
        
                    if ($isAdmin === 1) {
                        
                        return redirect()->to('/');
                    } else {
                        // User is not an admin, perform regular user actions
                        // For example, redirect to user dashboard, set user session, etc.
                        return redirect()->to('/');
                    }
                } else {
                    // User does not exist, create a new user record
                    $newUser = (new User())->insert([
                        'username' => $userModel->getDisplayName(),
                        'email' => $userModel->getMail(),
                    ]);
                  $newUserS = (new User())->where('email', $userModel->getMail())->first();
                    $newUserGroup = $userModel->getJobTitle();
                    $session->set('user', $newUserS);
                    $session->set('group', $newUserGroup);
                    return redirect()->to('/');
                }

                return redirect()->to('');
            } catch (IdentityProviderException | GuzzleException | GraphException $e) {
               exit('Error getting token: ' . $e->getMessage() . " " . $e::class);
            } finally {
                $session->close();
            }
        }
    return redirect()->to('');

    }


    public function logout()
{
    session()->remove('user');
   return redirect()->to('');
}

 
}
