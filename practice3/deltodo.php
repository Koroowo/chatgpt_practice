<?php
    include "connect.php";
    $id=$_POST["id"];
    $pdo->query("DELETE FROM `advanced_todo` WHERE `id`='$id'");
    
?>