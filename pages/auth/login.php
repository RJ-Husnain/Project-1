<?php

use App\Models\User;

// include_once 'app/user.php';
// $errorMsg = "";

// if($_SERVER['REQUEST_METHOD'] == 'POST'){

// $user = new User;

// $username= $user->username=$_POST['username'];
// $password= $user->password=$_POST['password'];

// if($user->login()){
//     // echo "loggedin Successfully";
//     header("Location: welcome.php");
//     session_start();
//     $_SESSION['username']= $username;
//     exit();
// }else{
//     // echo "Unable to login";
//     $errorMsg = $user->errorMsg;
// }

// }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to R.J Tech</title>
    <link rel="stylesheet" href="/assets/form.css">
</head>
<body class="flex">
<?php
    if (!empty($errorMsg)) {
       echo '
       <div class="error flex">
           <h2>'.$user->errorMsg.'</h2>
       </div>
       ';
    }
    ?>
    <!-- login -->
    <div class="loginForm flex">
        <div class="form">
            <h2>Login to <span>R.J Tech</span></h2>
            <p>Doesn't have an account <a href="register">Signup</a></p>
            <form class="flex" method="POST" action="/submit-login">
<div class="input flex">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
</div>

<div class="input flex">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <p>Incorrect Password!</p>
</div>

    <a href="/forum/partials/_forget.php" class="forget"><p>Forget Password?</p></a>
    <button type="submit">Login</button>

            </form>
        </div>
        <div class="img">
            <img src="/assets/form.jpg" alt="Login Illustration">
        </div>
    </div>
</body>
</html>
