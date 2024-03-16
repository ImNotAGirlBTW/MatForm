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

class AuthLog extends Controller
{
    public function login()
    {
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => '3d16f475-60ec-4d9e-afed-88b1b44e5c7f',
            'clientSecret'            => 'zFf8Q~Iu5lXESZsWnH.8onEu4XkGaCts2Id~YcS8',
            'redirectUri'             => base_url('callback'),
            'urlAuthorize'            => 'https://login.microsoftonline.com/f9e9eee3-6c9a-4068-a89c-6d96a10f21b9/oauth2/v2.0/authorize',
            'urlAccessToken'          => 'https://login.microsoftonline.com/f9e9eee3-6c9a-4068-a89c-6d96a10f21b9/oauth2/v2.0/token',
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
                'clientId'                => '3d16f475-60ec-4d9e-afed-88b1b44e5c7f',
                'clientSecret'            => 'zFf8Q~Iu5lXESZsWnH.8onEu4XkGaCts2Id~YcS8',
                'redirectUri'             => base_url('callback'),
                'urlAuthorize'            => 'https://login.microsoftonline.com/f9e9eee3-6c9a-4068-a89c-6d96a10f21b9/oauth2/v2.0/authorize',
                'urlAccessToken'          => 'https://login.microsoftonline.com/f9e9eee3-6c9a-4068-a89c-6d96a10f21b9/oauth2/v2.0/token',
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
                if ($existingUser) {
                    $session->set('user', $existingUser);

                    // User exists, check if the user is an admin
                    $isAdmin = (int) $existingUser['isAdmin'];
        
                    if ($isAdmin === 1) {
                        // User is an admin, perform admin-related actions
                        // For example, grant admin privileges, redirect to admin dashboard, etc.
                        return redirect()->to('/admin-dashboard');
                    } else {
                        // User is not an admin, perform regular user actions
                        // For example, redirect to user dashboard, set user session, etc.
                        return redirect()->to('/user-dashboard');
                    }
                } else {
                    // User does not exist, create a new user record
                    $newUser = (new User())->insert([
                        'username' => $userModel->getDisplayName(),
                        'email' => $userModel->getMail(),
                    ]);

                    $session->set('user', $newUser);
        
                    // Authenticate the new user and redirect
                    return redirect()->to('/user-dashboard');
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
