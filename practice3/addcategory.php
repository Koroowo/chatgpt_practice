<?php
    include "connect.php";
    $category=$_POST["category"];
    $pdo->query("INSERT INTO `advanced_todo_lists`(`list`) VALUES ('$category')");
?>