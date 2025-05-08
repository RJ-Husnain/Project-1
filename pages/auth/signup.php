
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup to R.J Tech</title>
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
    <!-- signup -->
    <div class="loginForm flex">
        <div class="form">
            <h2>Signup to <span>R.J Tech</span></h2>
            <p>Already have an Account <a href="login">Login</a></p>
            <form class="flex" method="POST" action="/submit-register">
                <div class="flex input">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <p>Username Already Exsit!</p>
                </div>

                <div class="flex input">
                    <label for="password">Password</label>
                    <h6>( Password must contain a digit, uppercase, lowercase, symbol and max 8-digits long )</h6>
                    <input type="password" id="password" name="password" required>
                    <p class="weak">Password is Weak!</p>
                </div>

                <div class="flex input">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword" required>
                    <p class="match">Password doesn't Match!</p>
                </div>
                <button type="submit">Signup</button>
            </form>
        </div>
        <div class="img">
            <img src="/assets/form.jpg" alt="Login Illustration">
        </div>
    </div>
    <!-- <script src="assets/form.js"></script> -->
</body>

</html>