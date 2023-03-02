<?php

namespace App\Models;

class Analytics extends \Core\Model

{
    public function __construct()
    {}

    public static function getRevenueByMonths($res_id)
    {
        $conn = static::getDB();
        $sql = "SELECT
                DATE_FORMAT(p.created_at, '%Y-%m-%d') AS Day,
                SUM(p.amount) AS Revenue
                FROM payments p
                INNER JOIN placed_orders o ON p.order_id = o.id
                INNER JOIN restaurants r ON o.restaurant_id = r.id
                WHERE r.id = :res_id
                GROUP BY DATE_FORMAT(p.created_at, '%Y-%m-%d')
                ORDER BY DATE_FORMAT(p.created_at, '%Y-%m-%d');
                ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("res_id", $res_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

}
