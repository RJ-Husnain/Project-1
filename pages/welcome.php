 <?php 

// include_once "guest.php";
// include_once "auth.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <link rel="stylesheet" href="/assets/form.css">
</head>
<body class="flex">
    <!-- login -->
    <div class="loginForm flex">
        <div class="form">
        <?php
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                echo '<h2>Welcome, ' . $_SESSION['username']. '!</h2>';
            } else{
                echo '<h2> Welcome Guest </h2>';
            }

            ?>
<a href="logout">
    <button id="logout">Logout</button>
</a>
            
        </div>
        <div class="img">
            <img src="/assets/form.jpg" alt="Login Illustration">
        </div>
    </div>
</body>
</html>