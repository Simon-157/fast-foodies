<?php

namespace App\Controllers;

use App\Models\Cart;
use Core\View;

class Carts extends \Core\Controller

{
    public function __construct()
    {

    }

    public function getCartAction()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           $items = Cart::getCartItems($id);
           echo  json_encode($items);
        }
        else{
            echo "a user must login ";
        }
    }

    public function testAction()
    {
        View::render('Test/test.php');
    }
}
