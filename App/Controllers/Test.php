<?php

namespace App\Controllers;

use \Core\View;


class Test extends \Core\Controller

{


    public function indexAction()
    {
        View::render('Test/test.php');
    }



}
