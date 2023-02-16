<?php

namespace App\Models;

use PDO;

class User extends \Core\Model

{

    private $conn;

    public function __construct()
    {

    }

    public static function getAll()
    {
        $conn = static::getDB();
        $stmt = $conn->query('SELECT cus_id, fname, lname, user_email FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByEmail($email)
    {
        $conn = static::getDB();
        $stmt = $conn->prepare('SELECT * FROM users WHERE user_email = :email LIMIT 1');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function register($fname, $lname, $email, $pass, $profileImg, $mode)
    {
        $conn = static::getDB();
        $password = password_hash($pass, PASSWORD_DEFAULT);
        switch ($mode) {
            case 'native':
                $query = "INSERT INTO users (fname, lname, user_email, password) VALUES (:fname,:lname, :email, :pass)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pass', $password);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }

            case 'google':
                $user = User::findByEmail($email);
                if ($user) {
                    return true;
                } else {

                    $stmt = $conn->prepare('INSERT INTO users (fname, lname, user_email, password, profileImg) VALUES (:fname, :lname, :email, :pass, :profileImg)');
                    $stmt->execute([
                        'fname' => $fname,
                        'lname' => $lname,
                        'email' => $email,
                        'pass' => $password,
                        'profileImg' => $profileImg,
                    ]);

                    if ($stmt->rowCount() == 1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            default:
                // Invalid mode, do nothing
                return false;

        }
    }

    public function login($email, $password)
    {
        $conn = static::getDB();
        $query = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                echo "Successfully authenticated";
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
