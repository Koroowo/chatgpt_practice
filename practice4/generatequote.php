<?php
    header("Content-type:Application/json");
    include "connect.php";
    $id=intval($_POST["id"]);
    $quotes=$pdo->query("SELECT * FROM `quotes`")->fetchAll(PDO::FETCH_ASSOC);
    $repeat=false;
    $number;
    while($repeat==false){
        $number=rand(1,count($quotes));
        if($number!=$id){
            $repeat=true;
        }
    }
    $quote=$pdo->query("SELECT * FROM `quotes` WHERE `id`='$number'")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($quote);
?>