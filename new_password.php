<?php 
    include 'connection/_dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $password_form = $_POST["password"];
            $E_password = password_hash($password_form, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM `user` WHERE `sno`='$id'";
            $result = mysqli_query($conn, $sql); 

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];

                $sql1 = "UPDATE `user` SET `password`='$E_password' WHERE `name`='$name' AND `sno`='$id'";   
                $result1 = mysqli_query($conn, $sql1);

                if ($result1) {
                    // Password updated successfully
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Failed to update the password " . mysqli_error($conn);
                }
            } else {
                echo "User not found!";
            }
        } else {
            echo "Invalid request!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="css/forget_password.css">
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
            <form action="new_password.php?id=<?php echo$_GET['id']; ?>" method="POST">
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
        <img src="images/Background.jpg" alt="background">
    </div>
</body>
</html>
