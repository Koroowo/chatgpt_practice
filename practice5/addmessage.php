<?php
    include "connect.php";
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $pdo->query("INSERT INTO `travel_message`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");
?>