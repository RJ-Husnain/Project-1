<?php
include'connection/_dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username_form = $_POST['username'];
    $phone = $_POST['phone'];
    $password_form = $_POST['password'];
    $E_password = password_hash($password_form, PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $interest = $_POST['interest'];
    $usernameError;
    
    $check_sql = "SELECT * FROM user WHERE username='$username_form'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        // echo "Username already exists. Please choose a different username.";
        $usernameError = "Username already exist";       
    } else {
    $sql = "INSERT INTO `user` (`name`, `email`, `phone`, `username`, `password`, `gender`, `country`, `interest`) VALUES ('$name', '$email', '$phone', '$username_form', '$E_password', '$gender', '$country', '$interest')";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
    } else {
        $_SESSION['name']= $name;
        $_SESSION['username']= $username_form;
        header("Location: welcome.php?name=" . urlencode($name));
        exit();
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signupfile.css">
</head>

<body>
    <div class="container flex">
        <!-- headings -->
        <div class="headings flex">
            <h1>Sign Up</h1>
            <h6>Already have an Account <a href="login.php">Login</a></h6>
        </div>
        <!-- form -->
        <div class="form">
            <form action="signup.php" method="POST" class='flex'>
            <!-- Profile photo -->
             <label for="photo">Selelct a profile Pic</label>
             <input type="file" name="photo" id="photo" required>
             
             <!-- name -->
             <label for="name">Name:</label>
             <input type="text" id="name" name="name" required>
             
             <!-- email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <!-- Phone number -->
            <label for="phone">Phone Number:</label>
            <input type="number" id="phone" name="phone" required>
            
            <!-- username -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <?php
                if (!empty($usernameError)) {
                    echo '<div class="erroruser">' . $usernameError . '</div>';
                }
                ?>
            
            <!-- password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <!-- Password requirement -->
            <div class="flex" >     
                <div class="pass_req flex" id="length">
                <img src="images/cross.png" alt="icon" class="icon" id='length-icon'>
                <p>Password contain 8 Character.</p>
                </div>
                <div class="pass_req flex" id="uppercase">
                <img src="images/cross.png" alt="icon" class="icon" id='uppercase-icon'>
                <p>Password contain any UpperCase Letter.</p>
                </div>
                <div class="pass_req flex" id="lowercase">
                <img src="images/cross.png" alt="icon" class="icon" id='lowercase-icon'>
                <p>Password contain any lower case letter.</p>
                </div>
                <div class="pass_req flex" id="digit">
                <img src="images/cross.png" alt="icon" class="icon" id='digit-icon'>
                <p>Password contain any Digit.</p>
                </div>
                <div class="pass_req flex" id="symbol">
                <img src="images/cross.png" alt="icon" class="icon" id='symbol-icon'>
                <p>Password contain any Special Symbol.</p>
                </div>
            </div>
            
            <!-- confirm password -->
            <label for="cpassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword" required>

            <div class="error">Password doesn't Match</div>

            <!-- country -->
            <label for="country">Choose a country:</label>
            <select name="country" id="country" required>
                <option value="">Select a country</option>
                <option value="United States">United States</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="India">India</option>
            </select>

            <!-- gender-->
            <label>Gender:</label>
            <div>
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" required>
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other" required>
            <label for="other">Other</label>
            </div>

            <!-- interest-->
            <label>Interest:</label>
            <div>
                <input type="checkbox" name="interest" id="programming" value="Programming">
                <label for="programming">Programming</label>
                
                <input type="checkbox" name="interest" id="designing" value="Designing">
                <label for="designing">Designing</label>
                
                <input type="checkbox" name="interest" id="otherInterest" value="Other">
                <label for="otherInterest">Other</label>
            </div>
            <!-- submit button -->
            <button type="submit">Sign Up</button>
        </form>
        </div>
    </div>
    <div class="image_container flex">
        <img src="images/Background.jpg" alt="background">
    </div>
    <script src="js/signupfile.js"></script>
</body>

</html>