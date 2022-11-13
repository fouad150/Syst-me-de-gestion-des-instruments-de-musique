<?php
session_start();
include('database.php');

if(isset($_POST['login'])){
    $password=$_POST['password'];
    $email=$_POST['email'];
    if(checkExist($email,$password)){
         echo "<script>window.location.replace('index.php')</script>";
    }else{
        $_SESSION['err-login']="Email or password incorrect try again";
        var_dump($_SESSION);
        //echo "<script>window.location.replace('login.php')</script>";
    }

}

function checkExist($email,$password){
    global $con;
    $query="SELECT * from admin WHERE email='$email' and psd='$password';";
    $rst= mysqli_query($con,$query);
    //var_dump($rst);
    $count = mysqli_num_rows($rst); // return number of rows
    //$assArr=mysqli_fetch_array($rst);
    //var_dump($assArr);
    //echo count($assArr);
    if($count>0){
        return true;
    }else{
        return false;
    }
}