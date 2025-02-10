<?php
    include "connect.php";
    $todo=$_POST["todo"];
    $priority=$_POST["priority"];
    $id=$_POST["id"];
    $pdo->query("UPDATE `advanced_todo` SET `task`='$todo',`priority`='$priority',`status`='0' WHERE `id`='$id'");
?>