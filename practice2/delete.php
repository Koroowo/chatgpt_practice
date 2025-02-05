<?php
    include "connect.php";
    $id=$_POST["id"];
    $pdo->query("DELETE FROM `todo` WHERE `id`='$id'");
?>