<?php
    header("Content-Type:application/json");
    $pdo=New PDO("mysql:host=localhost;dbname=chatgpt;charset=UTF8","admin","1234");
    $rows=$pdo->query("SELECT * FROM `todo`")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
?>