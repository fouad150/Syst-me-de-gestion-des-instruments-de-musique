<?php
include('database.php');
session_start();

if (isset($_POST['save']))     save();
if (isset($_POST['update']))   update();
if (isset($_POST['delete']))    delete();



function save()
{
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    global $con;
    $sql = "INSERT INTO `instruments`(`name`, `category_id`, `quantity`, `price`) VALUES 
    ('$name','$category_id','$quantity','$price')";
    mysqli_query($con, $sql);
    $_SESSION['successful-adding'] = "The instrument has been added successfully!   ";
    header('location: index.php');
}

function getInstrument()
{
    global $con;
    $sql = "SELECT instruments.* ,categories.name as ctg FROM instruments , categories WHERE instruments.category_id=categories.id";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr href='#modal-instrument' data-bs-toggle='modal' id='" . $row['id'] . "'  onclick='showModal(this)'>
                <th scope='row'>#</th>
                <td>" . $row['name'] . "</td>
                <td id='" . $row['category_id'] . "'>" . $row['ctg'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['price'] . "DH</td>
            </tr>";
    }
}

function update()
{
    $instrument_id = $_POST['instrument_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    global $con;
    $sql = "UPDATE `instruments` SET `name`='$name',`category_id`='$category_id',`quantity`='$quantity',`price`='$price' 
    WHERE `id`='$instrument_id'";
    mysqli_query($con, $sql);
    header('location: index.php');
}

function delete()
{
    $instrument_id = $_POST['instrument_id'];
    global $con;
    $sql = "DELETE FROM `instruments` WHERE id='$instrument_id'";
    mysqli_query($con, $sql);
    header('location: index.php');
}

if (isset($_POST['logout'])) {
    //var_dump($_SESSION['profil']);
    unset($_SESSION['profil']);
    echo "<script>window.location.replace('login.php')</script>";
}
