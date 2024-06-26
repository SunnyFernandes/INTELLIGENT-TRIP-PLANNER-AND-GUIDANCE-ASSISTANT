<?php
session_start();

if(isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "example_data");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $email = $_POST['emailcheck'];  
    $password = $_POST['passwordcheck'];  

    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $email = mysqli_real_escape_string($link, $email);  
    $password = mysqli_real_escape_string($link, $password);  

    $sql = "select * from customer_signup where email = '$email' and password = '$password'";  
    $result = mysqli_query($link, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if($count == 1){  
        $_SESSION['user_email'] = $email; // Set session variable upon successful login
        header('location:index.php');
        exit();
    }  
    else {  
        $message = "Incorrect email or password";
        echo "<script>alert('Incorrect email or password');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup/Login</title>
  <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">Travel Buddy</div>
      <div class="menu">
        <a href="index.php">Back</a>
      </div>
    </nav>
  </header>
  
  <main>
    <br>
    <br>
    <div class="cont">
        <form class="form sign-in" action="" method="post">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="emailcheck"/>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="passwordcheck"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit" name="submit">Sign In</button>
        </form>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h3>Don't have an account? Please Sign up!</h3>
                </div>
                <div class="img__text m--in">
                    <h3>If you already have an account, just sign in.</h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <form class="form sign-up" action="./insert.php" method="post">
                <h2>Create your Account</h2>
                <label>
                    <span>First Name</span>
                    <input type="text" name="fname" id='fname'/>
                </label>
                <label>
                    <span>Last Name</span>
                    <input type="text" name="lname" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" />
                </label>
                <label>
                    <span>Phone</span>
                    <input type="text" name="phone" />
                </label>
                
                <label>
                    <span>Password</span>
                    <input type="password" name="password"/>
                </label>
                <label>
                    <span>Confirm</span>
                    <input type="password" name="cpassword"/>
                </label>
                <button type="submit" class="submit" name='submitform'>Sign Up</button>
            </form>
        </div>
    </div>
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
  </main>
  
  <footer>
    <p>© 2024 Travel Buddy. All rights reserved.</p>
  </footer>
</body>
</html>
