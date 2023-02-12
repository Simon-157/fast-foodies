<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model

{

    private $conn;

    public function __construct()
    {

    }

    public static function getAll()
    {
        $conn = static::getDB();
        $stmt = $conn->query('SELECT cus_id, fname, lname, email FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function register($fname, $lname, $email, $pass)
    {
        echo "I am here";
        $conn = static::getDB();
        $query = "INSERT INTO users (fname, lname, email, password) VALUES (:fname,:lname, :email, :pass)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
        echo "got here";
        if ($stmt->execute()) {
            echo "Successfully registered";
            return true;
        } else {
            return false;
        }

    }

    public function login($email, $password)
    {
        $conn = static::getDB();
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
