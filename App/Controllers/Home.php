<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;

class Home extends \Core\Controller

{
    public function indexAction()
    {
        View::render('Home/index.php');
    }


    public function getuserAction(){
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userid = $_SESSION['user_id'];
            User::getUser($userid);
        }

        else{
            echo "A user must be autenticated";
        }
    }

}
