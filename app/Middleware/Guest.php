<?php
namespace App\Middleware;

class Guest{
    public function handle(){
        if(isset($_SESSION['username'])){
            // header("location: login.php");
            redirect('welcome');
            exit();
        }
    }
}

?>