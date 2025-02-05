<?php
    include "connect.php";
    $task=$_POST["task"];
    $pdo->query("INSERT INTO `todo`(`task_name`, `status`) VALUES ('$task','0')");
?>