<?php
// include_once 'database.php';
namespace App\Models;
// use mysqli;


class User extends BaseModels {
    private $table_name = 'user';
    public $username;
    public $password;
    public $error = false;
    public $errorMsg = '';

    public function register()
    {
        // print_r($_POST);
        // print_r($this->username);
        // exit();
        $username = $this->username;
        $password = $this->password;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $checkSql = "SELECT * FROM `$this->table_name` WHERE `username` = '$username'";
        $result = $this->conn->query($checkSql);
        if ($result && $result->num_rows == 0) {
            $sql = "INSERT INTO `$this->table_name` (`username`, `password`)
                VALUES ('$this->username', '$passwordHash')";

            if ($this->conn->query($sql)) {
                return true;
            } else {
                //   return false;
                $this->error = true;
                $this->errorMsg = 'Something wrong! Try Again';
            }
        } else {
            // return false;
            $this->error = true;
            $this->errorMsg = 'Username already exist.';
            // echo"username alreday exist";
        }
    }

    public function login()
    {
        $username = $this->username;
        $password = $this->password;

        $sql = "SELECT * FROM `$this->table_name` WHERE `username` = '$username'";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // echo"Password matched";
                // $this->id = $row['sno'];
                // $this->username = $row['username'];
                return true;
            } else {
                // echo"Incorrect Password!";
                $this->error = true;
                $this->errorMsg = 'Incorrect Password';
                // return false;
            }
        } else {
            // echo"No user";
            $this->error = true;
            $this->errorMsg = 'No user Found.';
            // return false;
        }
    }
}

?>