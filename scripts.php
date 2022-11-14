<?php
include('database.php');
session_start();

if (isset($_POST['logout'])) {
    //var_dump($_SESSION['profil']);
    unset($_SESSION['profil']);
    echo "<script>window.location.replace('login.php')</script>";
}
