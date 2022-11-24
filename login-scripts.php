<?php
session_start();
include('database.php');

if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['err-email-validation'] = "email not valid";
        echo "<script>window.location.replace('login.php')</script>";
    } else if (checkExist($email, $password)) {
        echo "<script>window.location.replace('index.php')</script>";
    } else {
        $_SESSION['err-login'] = "Email or password incorrect try again";
        echo "<script>window.location.replace('login.php')</script>";
    }
}

function checkExist($email, $password)
{
    global $con;
    $query = "SELECT * from admin WHERE email='$email' and psd='$password';";
    $rst = mysqli_query($con, $query);
    $number_rows = mysqli_num_rows($rst); // returns number of rows
    $assArr = mysqli_fetch_assoc($rst);
    // var_dump(count($assArr));
    if ($number_rows > 0) {
        $_SESSION['profil'] = $assArr['first_name'];
        return true;
    } else {
        return false;
    }
}
