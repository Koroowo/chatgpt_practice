<?php
    include "connect.php";
    $array=$_POST["array"];
    $number=1;
    for($i=0;$i<count($array);$i++){
        $id=intval($array[$i]);
        $pdo->query("UPDATE `advanced_todo` SET `order`='$number' WHERE `id`='$id'");
        $number++;
    }
?>