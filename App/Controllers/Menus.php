<?php

namespace App\Controllers;

use App\Models\Menu;
use Core\View;

class Menus extends \Core\Controller
{

    public function _construct()
    {

        return true;
    }

    public function indexAction()
    {
        $data = [
            'title' => 'some value',
        ];

        View::render('Menu/index.php', $data);
    }

    public function allmenusAction()
    {
        $data = Menu::getAllMenus();
        return $data;
    }


    public function addmenuAction()
    {
        if (isset($_POST['food_name'], $_POST['food_description'], $_POST['price'], $_POST['quantity'], $_POST['food_imgUrl'])) {
            // $restaurantId = $_POST['restaurant_id'];
            session_start();
            $restaurantId = $_SESSION['restaurant_id'];
            $foodName = $_POST['food_name'];
            $foodDescription = $_POST['food_description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $foodImgUrl = $_POST['food_imgUrl'];

            $menuModel = new Menu();
            $menuId = $menuModel->addMenu($restaurantId, $foodName, $foodDescription, $price, $quantity, $foodImgUrl);

            if ($menuId) {
                // Return success response
                $response = [
                    'status' => 'success',
                    'message' => 'Menu added successfully',
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


}