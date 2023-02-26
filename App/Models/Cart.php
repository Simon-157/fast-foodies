<?php

namespace App\Models;

use Exception;
use PDO;
use PDOException;

class Cart extends \Core\Model
{

    private $db;

    public function __construct()
    {

    }

    
    public function addToCart($user_id, $menu_id, $quantity)
    {
        $conn = static::getDB();
        try {
            $stmt = $conn->prepare("INSERT INTO cart_items (user_id, menu_id, quantity) VALUES (:user_id, :menu_id, :quantity)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':menu_id', $menu_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function removeFromCart($user_id, $menu_id)
    {
        try {
            $conn = static::getDB();
            $stmt = $conn->prepare("DELETE FROM cart_items WHERE user_id = :user_id AND id = :menu_id");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':menu_id', $menu_id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            
            error_log("Error removing item from cart: " . $e->getMessage());
            return false;
        } catch (Exception $e) {
            
            error_log("Error removing item from cart: " . $e->getMessage());
            return false;
        }
    }


    public static function getCartItems($user_id)
    {
        // echo $user_id;
        $response = array();
        try {
            $conn = static::getDB();
            $stmt = $conn->prepare(


                " SELECT cart_items.quantity,
                cart_items.id,
                cart_items.created_at,
                menu.food_name,
                menu.food_description,
                menu.food_imgUrl,
                menu.price as price_per_one,
                menu.price * cart_items.quantity as subtotal
                FROM cart_items 
                INNER JOIN menu ON cart_items.menu_id = menu.id 
                WHERE cart_items.user_id = :user_id
                GROUP BY (menu.id);
                "
            );
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($cartItems) {
                $response['status'] = 'success';
                $response['data'] = $cartItems;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'No items found in cart';
            }
        } catch (PDOException $e) {
            $response['status'] = 'error';
            $response['message'] = 'Error retrieving cart items: ' . $e->getMessage();
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    public function clearCart($user_id)
    {
        $stmt = $this->db->prepare("DELETE FROM cart_items WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return true;
    }

}