<?php 
    include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_form = $_POST["username"];
    $email = $_POST["email"];  
    $password_form = $_POST["password"];
    $E_password = password_hash($password_form, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM user WHERE username='$username_form' AND email='$email'";
    $result = mysqli_query($conn, $sql); 
    $userdata= mysqli_fetch_assoc($result);
    $name= $userdata['name'];
    if (mysqli_num_rows($result) > 0) {
        $sql1 = "UPDATE user SET password='$E_password' WHERE username='$username_form' AND email='$email'";   
        $result1 = mysqli_query($conn, $sql1);
        $success= "  Successfully updated the password";
        if ($result1) {
            // echo "Successfully updated the password.";
            header("Location: welcome.php?name=" .urlencode($name ) .urlencode($success));
        } else {
            echo "Failed to update the password due to this error:". mysqli_error($result1);
        }
    }
}       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="forget_password.css">
</head>
<body>
    <div class="container flex">
        <!-- headings -->
        <div class="headings flex">
            <h2>Reset Password</h2>
            <h5>Forget password or <a href="signup.php">Sign Up</a></h5>
        </div>
        <!-- form -->
        <div class="form">
            <form action="new_password.php" method="POST">
                <!-- hidden fields for username and email -->
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['username']); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
                <!-- new password -->
                <div class="password_box flex">
                    <div>
                        <label for="password">Enter your New Password</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" required>
                    </div>
                </div>
                <!-- Submit Button  -->
                <div class="login flex">
                    <button type="submit">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
    <div class="image_container flex">
        <img src="Background.jpg" alt="background">
    </div>
</body>
</html>