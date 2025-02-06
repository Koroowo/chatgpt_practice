<?php
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Task Management System</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
    <script src="jquery-ui.js"></script>
</head>
<body>
    <div class="page_section">
        <div class="left_section">
            <h2 class="m-0 ">Menu</h2>
            <div class="menu_list">
                <h4 class="m-0">LISTS</h4>
                <?php
                    $lists=$pdo->query("SELECT * FROM `advanced_todo_lists`")->fetchAll();
                    foreach($lists as $list){
                        echo "<p class='btn' onclick='Category(".'"'.$list["list"].'"'.")'>".$list["list"]."</p>";
                    }
                ?>
                
            </div>
        </div>
        <div class="right_section">
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn btn-success" onclick="window.location.href=''">Add Category</button>
            </div>
            <div class="category_container">
                <?php
                    $lists=$pdo->query("SELECT * FROM `advanced_todo_lists`")->fetchAll();
                    foreach($lists as $list){
                        echo "<div class='category_div' onclick='Category(".'"'.$list["list"].'"'.")'><h3 class='m-0'>".$list["list"]."</h3></div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function Category(name){
        $.ajax({
            url:"setcategory.php",
            method:"POST",
            data:{category:name}
        }).done(function(){
            window.location.href='Todo.php';
        })
    }
</script>