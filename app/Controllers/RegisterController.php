<?php
namespace App\Controllers;

use App\Models\User;

class RegisterController
{
    public function index()
    {
        // echo 'RegisterController Index Function';
        // require_once ('pages/signup.php');
        view('auth.signup');
    }

    public function register()
    {
        // $errorMsg = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // print_r($_POST);
            // exit();
            $user = new User;
            $username = $user->username = $_POST['username'];
            $password = $user->password = $_POST['password'];

            if ($user->register()) {
                echo 'User Registered Successfully';
                // header("Location: login.php");
                // exit();
            } else {
                echo 'Unable to Registered';
                // $errorMsg = $user->errorMsg;
            }
        }
    }
}

?>