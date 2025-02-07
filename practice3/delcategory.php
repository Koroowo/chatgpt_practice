<?php
    include "connect.php";
    $category=$_SESSION["category_name"];
    $pdo->query("DELETE FROM `advanced_todo_lists` WHERE `list`='$category'");
?>