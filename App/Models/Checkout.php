<?php

namespace App\Models;

use PDO;

class CheckoutController extends \Core\Model
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function processPayment($user_id, $payment_method)
    {
        // Retrieve the user's cart items and total price
        $stmt = $this->db->prepare("
            SELECT
                ci.id AS cart_item_id,
                m.id AS menu_id,
                m.name AS menu_name,
                m.price AS menu_price,
                ci.quantity AS quantity,
                (m.price * ci.quantity) AS total_price
            FROM
                cart_items ci
                JOIN menus m ON ci.menu_id = m.id
            WHERE
                ci.user_id = :user_id
        ");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_price = array_reduce($cart_items, function ($carry, $item) {
            return $carry + $item['total_price'];
        }, 0);

        // Insert a new order into the database
        $stmt = $this->db->prepare("
            INSERT INTO orders (user_id, status)
            VALUES (:user_id, 'pending')
        ");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $order_id = $this->db->lastInsertId();

        // Insert the order items into the database
        foreach ($cart_items as $item) {
            $stmt = $this->db->prepare("
                INSERT INTO order_items (order_id, menu_id, quantity)
                VALUES (:order_id, :menu_id, :quantity)
            ");
            $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
            $stmt->bindParam(':menu_id', $item['menu_id'], PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $item['quantity'], PDO::PARAM_INT);
            $stmt->execute();
        }

        // Insert the payment information into the database
        $stmt = $this->db->prepare("
            INSERT INTO payments (order_id, amount, payment_method)
            VALUES (:order_id, :amount, :payment_method)
        ");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindParam(':amount', $total_price, PDO::PARAM_STR);
        $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);
        $stmt->execute();

        // Update the order status to 'confirmed'
        $stmt = $this->db->prepare("
            UPDATE orders
            SET status = 'confirmed'
            WHERE id = :order_id
        ");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();

        // Remove the cart items from the database
        $stmt = $this->db->prepare("
            DELETE FROM cart_items
            WHERE user_id = :user_id
        ");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }
}
