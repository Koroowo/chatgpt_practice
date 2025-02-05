<?php
    include "connect.php";
    $task=$_POST["task"];
    $id=$_POST["id"];
    $pdo->query("UPDATE `todo` SET `task_name`='$task',`status`='0' WHERE `id`='$id'");
?>