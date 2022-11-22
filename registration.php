<?php
session_start(); // to make all session variables inside this file global scoped
include('database.php');

if(isset($_POST['sign_up'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    if(checkEmpty($first_name,$last_name,$email,$password)){
        $_SESSION['err-validation']="Please fill all the fields";
        echo "<script>window.location.replace('sign-up.php')</script>";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['err-email-validation']="the special characters are not allowed in the email";
        echo "<script>window.location.replace('sign-up.php')</script>";
    }else{
        if(!checkExist($email)){
            insertDB($first_name,$last_name,$email,$password);
            //redirection to login
             echo "<script>window.location.replace('login.php')</script>";
        }else{
            // email entered alredy exist in DB 
            $_SESSION['err-singup']="Email Already Exist";
           // echo $_SESSION['err-singup'];
            echo "<script>window.location.replace('sign-up.php')</script>";
        }
    }
}

function checkExist($email){
    global $con;
    $query="SELECT * from admin WHERE email='$email';";
    $rst= mysqli_query($con,$query);
    //var_dump($rst);
    $count = mysqli_num_rows($rst); // return number of rows
    //$assArr=mysqli_fetch_array($rst);
    if($count>0){
        return true;
    }else{
        return false;
    }
}

function insertDB($first_name,$last_name,$email,$password){
    global $con;
    $query="INSERT INTO `admin`( `first_name`, `last_name`, `email`, `psd`) VALUES ('$first_name','$last_name','$email','$password')";
    $rst=mysqli_query($con,$query);// return an object if succeed or false if failed
    // err handling 
    if($rst==false){
        $_SESSION['err-singup']="error while inserting ..";
        //redirection to signup because of error exist
        header("location : ./sign-up.php");

    }
}

function checkEmpty($first_name,$last_name,$email,$password){
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)){
        return true;
    }else{
        return false;
    }
}