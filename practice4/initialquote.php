<?php
    include "connect.php";
    $quotes=$pdo->query("SELECT * FROM `quotes`")->fetchAll(PDO::FETCH_ASSOC);
    $number=rand(1,count($quotes));
    $quote=$pdo->query("SELECT * FROM `quotes` WHERE `id`='$number'")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($quote);
?>