<?php

namespace App\Controllers;

use Core\View;

class Customers extends \Core\Controller

{
    public function registerAction()
    {
        View::render('Auth/register.php');
    }

    public function loginAction()
    {
        View::render('Auth/login.php');
    }
}
