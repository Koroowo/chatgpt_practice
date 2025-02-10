<?php
    include "connect.php";
    $todo=$_POST["todo"];
    $priority=$_POST["priority"];
    $category=$_SESSION["category_name"];
    $time=date("Y-m-d H:i:s");
    $order=count($pdo->query("SELECT * FROM `advanced_todo` WHERE `category`='$category'")->fetchAll())+1;
    $pdo->query("INSERT INTO `advanced_todo`(`task`, `priority`, `category`, `order`, `date`,`status`) VALUES ('$todo','$priority','$category','$order','$time','0')");
?>