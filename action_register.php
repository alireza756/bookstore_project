<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$username2 = $_POST['username'];
$password2 = $_POST['password'];
$email = $_POST['email'];
// $type = $_POST['type'];
$connection = mysqli_connect('localhost','root','','bookstore');

if (!$connection) {
    die("failed" . mysqli_connect_error());
}

$sql = "INSERT INTO `users` (id , username , password , email , type) VALUES (0,'$username2' , '$password2' , '$email' , 0)";

if (mysqli_query($connection,$sql)){
    header("Location: login.php");
}else{
    echo "failed" . mysqli_error();
}