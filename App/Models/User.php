<?php

namespace App\Models;

use PDO;
use PDOException;

class User extends \Core\Model
{

    private $conn;

    public function __construct()
    {

    }

    public static function getUser($user_id)
    {
        // echo $user_id;
        $response = array();
        try {
            $conn = static::getDB();
            $stmt = $conn->prepare(
                " SELECT * from users where id = :user_id
                "
            );
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user) {
                $response['status'] = 'success';
                $response['data'] = $user;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Not Authenticated';
            }
        } catch (PDOException $e) {
            $response['status'] = 'error';
            $response['message'] = 'Error retrieving user info: ' . $e->getMessage();
        }
        header('Content-Type: application/json');
        echo json_encode($response);
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
                $query = "INSERT INTO users (fname, lname, user_email, user_password) VALUES (:fname,:lname, :email, :pass)";
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

                    $stmt = $conn->prepare('INSERT INTO users (fname, lname, user_email, user_password, profileImg) VALUES (:fname, :lname, :email, :pass, :profileImg)');
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
            if (password_verify($password, $user['user_password'])) {

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function loginRestaurantAdmin($email, $password, $admin_key)
    {
        $conn = static::getDB();
        $query = "SELECT * FROM restaurants WHERE res_email = :email and uniquecode = :unique_key";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':unique_key', $admin_key);
        $stmt->execute();

        $restaurant_admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($restaurant_admin) {
            return $restaurant_admin;
            /** to do: hash the random unique key before this line will be uncommented **/
            // if (password_verify($password, $restaurant_admin['user_password'])) {
            //     echo "Successfully authenticated";
            //     return $user;
            // } else {
            //     return false;
            // }
        } else {
            return false;
        }
    }

}