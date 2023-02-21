<?php

namespace App\Models;

use PDO;
use PDOException;

class Cart extends \Core\Model
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addToCart($user_id, $menu_id, $quantity)
    {
        $menu = $this->db->query("SELECT price FROM menus WHERE id = {$menu_id}")->fetch(PDO::FETCH_ASSOC);
        $price = $menu['price'];
        $subtotal = $price * $quantity;

        $this->db->beginTransaction();
        try {
            $stmt = $this->db->prepare("INSERT INTO cart_items (user_id, menu_id, quantity, price, subtotal) VALUES (:user_id, :menu_id, :quantity, :price, :subtotal)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':menu_id', $menu_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':subtotal', $subtotal);
            $stmt->execute();
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function removeFromCart($user_id, $menu_id)
    {
        $stmt = $this->db->prepare("DELETE FROM cart_items WHERE user_id = :user_id AND menu_id = :menu_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->execute();
        return true;
    }

    public static function getCartItems($user_id)
    {
        $response = array();
        try {
            $conn = static::getDB();
            $stmt = $conn->prepare(
                "SELECT *
                FROM cart_items 
                INNER JOIN menu ON cart_items.menu_id = menu.id 
                WHERE cart_items.user_id = :user_id ");
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