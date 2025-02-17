<?php
    include "connect.php";
    $rows=$pdo->query("SELECT * FROM `travel_message` ORDER BY `create_date` DESC")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
?>