<?php 
    include 'connection/_dbconnect.php';
    session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_form = $_POST["username"];
    $password_form = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username='$username_form'";
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result) > 0) {
        $userdata = mysqli_fetch_assoc($result);
        $name= $userdata['name'];

        if (password_verify($password_form, $userdata['password'])) {
            
            $_SESSION['name']= $name;
            $_SESSION['username']= $username_form;
 
            header("Location: welcome.php");
            exit();
        } else {
            $usernameError= "Incorrect password.";
        }
    } else {
        $usernameError= "username not found.";
    }
}       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginpage.css">
</head>
<body>
    <div class="container flex">
        <!-- headings -->
        <div class="headings flex">
            <h1>Login</h1>
            <h6>Don't have an account? <a href="signup.php">Sign Up</a></h6>
        </div>
        <!-- form -->
        <div class="form">
            <form action="login.php" method="POST">
                <!-- username -->
                <div class="username_box flex">
                    <div>
                        <label for="username">Username</label>
                    </div>
                    <div>
                        <input type="text" name="username" id="username" required>
                    </div>
                </div>
                <!-- password -->
                <div class="password_box flex">
                    <div>
                        <label for="password">Password</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" required>
                    </div>
                </div>
                <div class="fwpassword">
                <div class="erroruser"></div>
                    <?php
                if (!empty($usernameError)) {
                    echo '<div class="wrong">' . $usernameError . '</div>';
                }
                ?>
                    <div class="forget">
                        <a href="forget_password.php">Forget Password</a>
                    </div>
                </div>
                <!-- Submit Button  -->
                <div class="login flex">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="image_container flex">
        <img src="images/Background.jpg" alt="background">
    </div>
</body>
</html>