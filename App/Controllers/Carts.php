<?php

namespace App\Controllers;

use App\Models\Cart;
use Core\View;

class Carts extends \Core\Controller

{
    public function __construct()
    {

    }

    public function viewAction(){
        View::render('Menu/cart.php');
    }

    public function getCartAction()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
          Cart::getCartItems($id);
        //    echo  json_encode($items);
        }
        else{
            echo "a user must login ";
        }
    }

    public function removefromCartAction()
    {
            session_start();
            if (empty($_SESSION['user_id'])) {
               
                header('Location: /fast-foodies/login');
                exit();
            }
    
            if (empty($_POST['item_id'])) {
              
                $response = [
                    'status' => 'error',
                    'message' => 'Menu ID is required'
                ];
            } else {
                $user_id = $_SESSION['user_id'];
                $itemid = $_POST['item_id'];
                $cartModel = new Cart();
                // echo $itemid;
                $isRemoved = $cartModel->removeFromCart($user_id, $itemid);
                if ($isRemoved) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Menu removed from cart successfully',
                        'item_id' => $itemid
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Unable to remove menu from cart'
                    ];
                }
            }
            header('Content-Type: application/json');
            echo json_encode($response);   
    }
    
    public function add_cartItemAction()
    {
        if (isset($_POST['quantity'], $_POST['menu_id'])){

        
            // $restaurantId = $_POST['restaurant_id'];
            session_start();
            $userid = $_SESSION['user_id'];
            $menuId = $_POST['menu_id'];
            $quantity = $_POST['quantity'];

            $cartItem = new Cart();
            $cartItemId = $cartItem->addToCart($userid, $menuId, $quantity);
            if ($cartItemId) {
                // Return success response
                $response = [
                    'status' => 'success',
                    'message' => 'Food added successfully',
                    'menu_id' => $menuId
                ];
            } else {
                // Return error response
                $response = [
                    'status' => 'error',
                    'message' => 'Unable to add menu'
                ];
            }
        } else {
            // Return error response if any field is missing
            $response = [
                'status' => 'error',
                'message' => 'All fields are required'
            ];
        }

        // Convert the response to JSON and return it
        header('Content-Type: application/json');
        echo json_encode($response);
    }



    public function testAction()
    {
        View::render('Test/test.php');
    }
}
