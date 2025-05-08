<?php
namespace App\Controllers;

class DashboardController{
    public function index(){
        // echo 'Home Controller Index Function';
        // require_once('pages/welcome.php');
        view('welcome');
    }

    public function logout(){
        $_SESSION = [];
        session_destroy();
        redirect('login');
        // header("location: login.php");
        exit();

    }
}


?>