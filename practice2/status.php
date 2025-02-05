<?php
    include "connect.php";
    $status=$_POST["status"];
    $id=$_POST["id"];
    $pdo->query("UPDATE `todo` SET `status`='$status' WHERE `id`='$id'");
?>