<?php

namespace App\Models;
use PDOException;
use PDO;

class CartController extends \Core\Model{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($user_id, $menu_id, $quantity) {
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
        } catch(PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function removeFromCart($user_id, $menu_id) {
        $stmt = $this->db->prepare("DELETE FROM cart_items WHERE user_id = :user_id AND menu_id = :menu_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->execute();
        return true;
    }

    public function getCartItems($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM cart_items WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cartItems;
    }

    public function clearCart($user_id) {
        $stmt = $this->db->prepare("DELETE FROM cart_items WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return true;
    }

}

