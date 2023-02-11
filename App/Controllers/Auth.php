<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends \Core\Controller

{

    private $userController;

    public function __construct()
    {

        $this->userController = new User();
    }

    public function createAction(): bool
    {
        echo "Submitted successfully";

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "first: " . $firstname . " last: " . $lastname;
        return true;

    }

    public function authenticate()
    {
        session_start();

        if (isset($_GET['email']) && isset($_GET['password'])) {
            $email = $_GET['email'];
            $password = $_GET['password'];

            $user = $this->userController->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                echo 'Welcome, ' . $user['name'] . '!';
            } else {
                echo 'Incorrect email or password.';
            }
        }
    }

}
