<?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'connection/_dbconnect.php';
            $username_form = $_POST["username"];
            $email = $_POST["email"]; 
            
            $sql = "SELECT * FROM user WHERE username='$username_form' And email='$email'";
            $result = mysqli_query($conn, $sql); 
            if (mysqli_num_rows($result) > 0){  
                $row = mysqli_fetch_assoc($result);
    $id= $row['sno'];            
                header("Location: new_password.php?id=$id");
                exit;
            }
            else{
                echo"username doesn't exist";
                // $error_message = "Username doesn't exist";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/forget_password.css">
</head>
<body>
    <div class="container flex">
        <!-- headings -->
        <div class="headings flex">
            <h2>Forget Password</h2>
            <h5>Forget password or <a href="signup.php">Sign Up</a></h5>
        </div>
        <!-- form -->
        <div class="form">
            <form action="forget_password.php" method="POST">
                <!-- username -->
                <div class="username_box flex">
                    <div>
                        <label for="username">Enter your Username</label>
                    </div>
                    <div>
                        <input type="text" name="username" id="username" required>
                    </div>
                </div>
                <!-- email -->
                <div class="username_box flex">
                    <div>
                        <label for="email">Enter your Email</label>
                    </div>
                    <div>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>
                <!-- Submit Button  -->
                <div class="login flex">
                    <button type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
    <div class="image_container flex">
        <img src="images/Background.jpg" alt="background">
    </div>
</body>
</html>