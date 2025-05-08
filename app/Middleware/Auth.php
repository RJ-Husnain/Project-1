<?php
namespace App\Middleware;
class Auth{
    public function handle(){
        if(!isset($_SESSION['username'])){
            // header("location: login.php");
            redirect('login');
            exit();
        }
    }
}

?>