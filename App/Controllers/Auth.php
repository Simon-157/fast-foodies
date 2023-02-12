<?php

namespace App\Controllers;

use Core\View;
use \App\Models\User;

class Auth extends \Core\Controller

{

    private $userController;

    public function __construct()
    {

        $this->userController = new User();
    }

    public function createAction()
    {
        echo "Submitted successfully";

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname'])) {

            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            echo "firstName: " . $firstName . " lastName: " . $lastName;
            $newUser = User::register($firstName, $lastName, $email, $password);
            if ($newUser) {

                echo '<h2 style="color:green">Successfully registered</h2>';
                return true;
                # code...
            } else {
                echo '<h2 style="color:red">Registeration Unsuccessful</h2>';
                return false;
            }

        }

    }

    public function authenticateAction()
    {
        session_start();

        if (isset($_GET['email']) && isset($_GET['password'])) {
            $email = $_GET['email'];
            $password = $_GET['password'];
            $user = $this->userController->login($email, $password);
            if ($user) {
                $_SESSION['current_user'] = $user;
                echo 'Welcome, ' . $user['fname'] . '!';
                View::render('Home/index.php');
            } else {
                echo 'Incorrect email or password.';
            }
        }
    }

}
