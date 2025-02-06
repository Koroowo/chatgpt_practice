<?php
    include "connect.php";
    header("Content-type:application/json");
    $lists=$pdo->query("SELECT * FROM `advanced_todo_lists`")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($lists);
?>