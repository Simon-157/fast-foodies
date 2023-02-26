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

    public function registerAction()
    {
        View::render('Auth/register.php');
    }

    public function loginAction()
    {
        View::render('Auth/login.php');
    }

    public function createAction()
    {
        // echo "Submitted successfully";
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname'])) {

            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo "firstName: " . $firstName . " lastName: " . $lastName;
            $newUser = User::register($firstName, $lastName, $email, $password, '', 'native');
            if ($newUser) {

                echo '<h3 style="color:green;font-size:14px;display:flex;justify-content:center;">Successfully registered</h3>';
                return false;
                # code...
            } else {
                echo '<h2 style="color:red">Registration Unsuccessful</h2>';
                return false;
            }

        } else {
            echo "All fields are required";
        }

    }

    public function auth_resAction()
    {

    }


    public function authenticateAction()
    {
        session_start();

        if (isset($_GET['email']) && isset($_GET['password'])) {

            if ($_GET['user-type'] === "admin") {

                $email = $_GET['email'];
                $password = $_GET['password'];
                $res_secret_code = $_GET['admin-key'];
                $restaurant = $this->userController->loginRestaurantAdmin($email, $password, $res_secret_code);
                if ($restaurant) {
                    $_SESSION['admin_key'] = $restaurant['uniquecode'];
                    $_SESSION['restaurant_id'] = $restaurant['id'];
                    $_SESSION['res_email'] = $restaurant['res_email'];
                    $_SESSION['res_logo'] = $restaurant['img_url'];
                    $_SESSION['res_name'] = $restaurant['res_name'];
                    $response = array(
                        'success' => true,
                        'message' => 'admin'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Incorrect email or secret key'
                    );
                }
            } else {
                $email = $_GET['email'];
                $password = $_GET['password'];
                $user = $this->userController->login($email, $password);
                if ($user) {
                    $_SESSION['current_user'] = $user;
                    $_SESSION['user_id'] = $user['id'];
                    $response = array(
                        'success' => true,
                        'message' => 'customer'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Incorrect email or password'
                    );
                }
            }

        } else {
            $response = array(
                'success' => false,
                'message' => 'Email and password required'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function createUserSession($user)
    {

        $_SESSION['usersId'] = $user->usersId;
        $_SESSION['usersName'] = $user->usersName;
        $_SESSION['usersEmail'] = $user->usersEmail;
        View::render('Admin/index.php');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['current_user']);
        setcookie("user_id", "", time() - 3600);
        session_destroy();
        View::render('Home/index.php');
    }

}