<?php

namespace App\Controllers;

use App\Models\Customer;
use \Core\View;

require_once '../helpers/session.php';

class Customers
{

    private $customer;

    public function __construct()
    {
        $this->customer = new Customer;
    }

    public function register()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, htmlspecialchars(INPUT_POST));

        //Init data
        $data = [
            'fname' => trim($_POST['lname']),
            'lname' => trim($_POST['lname']),
            'email' => trim($_POST['usersEmail']),
            'cus_id' => trim($_POST['usersUid']),
            'password' => trim($_POST['password']),

        ];

        //Validate inputs
        if (empty($data['fname']) || empty($data['email']) || empty($data['cus_id']) ||
            empty($data['password']) || empty($data['lname'])) {
            $message = " Please fill out all inputs";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['cus_id'])) {
            $message = " Invalid user name";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $message = " email failed";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        }

        if (strlen($data['password']) < 6) {
            $message = " invalid password";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        } else if ($data['usersPwd'] !== $data['pwdRepeat']) {
            $message = "password do not match";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        }

        //User with the same email or password already exists
        if ($this->customer->findUserByEmailOrUsername($data['email'], $data['fname'])) {
            $message = "username or email already taken";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Register User
        if (Customer::register($data)) {
            View::render('Admin/index.php');
        } else {
            die("Something went wrong");
        }
    }

    public function login()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, htmlspecialchars(INPUT_POST));

        //Init data
        $data = [
            'name/email' => trim($_POST['name/email']),
            'usersPwd' => trim($_POST['usersPwd']),
        ];

        if (empty($data['name/email']) || empty($data['usersPwd'])) {
            $message = "Please fill out all inputs";
            View::render('Admin/index.php', [
                'data' => $message,
            ]);
            exit();
        }

        //Check for user/email
        if ($this->customer->findUserByEmailOrUsername($data['name/email'], $data['name/email'])) {
            //User Found
            $loggedInUser = $this->customer->login($data['name/email'], $data['usersPwd']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
            } else {
            $message = "Password Incorrect";
                     View::render('Admin/index.php', [
        'data' => $message
    ]);
            }
        } else {
            $message = "No user found";
                 View::render('Admin/index.php', [
        'data' => $message
    ]);
        }
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
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        View::render('Admin/index.php');
    }
}

$init = new Customers;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            View::render('Admin/index.php');
    }

} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            View::render('Admin/index.php');
    }
}
