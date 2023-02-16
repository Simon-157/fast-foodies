<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Config;
use App\Models\User;
use Google\Client;

class GoogleAuth extends \Core\Controller

{

    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(Config::GOOGLE_CLIENT_ID);
        $this->client->setClientSecret(Config::GOOGLE_CLIENT_SECRET);
        $this->client->setRedirectUri(Config::GOOGLE_CLIENT_REDIRECT_URI);
        $this->client->setAccessType('offline');
        $this->client->setApprovalPrompt('force');
        $this->client->setScopes([
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email',
        ]);
    }

    public function indexAction()
    {

        // If user is already signed in, redirect to home page
        if (isset($_SESSION['current_user'])) {
            header('Location: /fast-foodies/menu');
            exit();
        } else {

            // If user clicked sign in with Google, redirect to Google sign-in page
            if (isset($_POST['sign-in'])) {
                $authUrl = $this->client->createAuthUrl();
                header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
                exit();
            }

            // If Google sign-in callback is received, handle it
            if (isset($_GET['code'])) {
                $code = $_GET['code'];
                $accessToken = $this->client->fetchAccessTokenWithAuthCode($code);
                $this->client->setAccessToken($accessToken);

                // Get user info
                $oauth2 = new \Google\Service\Oauth2($this->client);
                $userInfo = $oauth2->userinfo->get();
                $userId = $userInfo->id;
                $email = $userInfo->email;
                $firstName = $userInfo->givenName;
                $lastName = $userInfo->familyName;
                $userPictureUrl = $userInfo->picture;

                // Save user info to database

                $newUser = User::register($firstName, $lastName, $email, $userId, $userPictureUrl, 'google');
                if ($newUser) {
                    session_start();
                    $_SESSION['current_user'] = User::findByEmail($email);
                    echo '<h2 style="color:green">Successfully registered</h2>';
                    header('Location: /fast-foodies/menu');
                    exit();
                    // return true;

                } else {
                    echo '<h2 style="color:red">Registration Unsuccessful</h2>';
                    return false;
                }
            }

        }

    }

}
