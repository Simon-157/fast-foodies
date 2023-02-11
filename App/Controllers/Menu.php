<?php

namespace App\Controllers;

use Core\View;

class Menu extends \Core\Controller

{

    public function indexAction()
    {
        View::render('Menu/index.php');
    }
}
