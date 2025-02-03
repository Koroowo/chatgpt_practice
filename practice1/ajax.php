<?php
    header("Content-Type: application/json");
    $pdo=New PDO("mysql:host=localhost;dbname=chatgpt;charset=UTF8","admin","1234");
    if($_POST["input"]!=""){
        $input=$_POST["input"];
        $result=$pdo->query("SELECT * FROM `places` WHERE `name` LIKE '%$input%'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }else{
        echo json_encode([]);
    }
?>