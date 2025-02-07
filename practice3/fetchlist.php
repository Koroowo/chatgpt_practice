<?php
    header("Content-type:Application/json");
    include "connect.php";
    $category=$_SESSION["category_name"];
    $lists=$pdo->query("SELECT * FROM `advanced_todo` WHERE `category`='$category' ORDER BY `order` DESC")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($lists);
?>