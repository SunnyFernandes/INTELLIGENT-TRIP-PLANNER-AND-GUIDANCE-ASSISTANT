<?php

$link = mysqli_connect("localhost", "root", "", "example_data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['fname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$confirm = mysqli_real_escape_string($link, $_REQUEST['cpassword']);
 
// Attempt insert query execution
$sql = "INSERT INTO customer_signup (firstname, lastname, email, phonenumber, password, confirmpassword) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$confirm')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header('location:index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>