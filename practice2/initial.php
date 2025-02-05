<?php
    include "connect.php";
    header("Content-Type:application/json");
    $rows=$pdo->query("SELECT * FROM `todo`")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
?>