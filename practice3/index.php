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
            <div class="menu_list" id="menu_list">
                
            </div>
        </div>
        <div class="right_section">
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn btn-success" onclick="modal();">Add Category</button>
            </div>
            <div class="category_container" id="category_container">
                <?php
                    $lists=$pdo->query("SELECT * FROM `advanced_todo_lists`")->fetchAll();
                    foreach($lists as $list){
                        echo "";
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal_div" id="modal_div">
            <button class="modal_exit btn btn-danger" onclick="exitmodal()">X</button>
            <input type="text" id="category_input" name="category" class="mb-4 form-control" placeholder="Category:" required>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-3" onclick="send();">Add</button>
                <button type="button" class="btn btn-warning mx-3" onclick="reset();">Reset</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function initial(){
        $.ajax({
            url:"fetchcategory.php",
            method:"GET"
        }).done(function(lists){
            let list="<h4 class='m-0'>LISTS</h4>";
            let category="";
            document.getElementById("menu_list").innerHTML="";
            document.getElementById("category_container").innerHTML="";
            for(i=0;i<lists.length;i++){
                list +="<p class='btn' onclick='Category(\""+ lists[i].list +"\")'>"+lists[i].list+"</p>";
                category +="<div class='category_div' onclick='Category(\""+ lists[i].list +"\")'><h3 class='m-0'>"+ lists[i].list +"</h3></div>"
            }
            document.getElementById("menu_list").innerHTML=list;
            document.getElementById("category_container").innerHTML=category;
        })
    }
    function Category(name){
        $.ajax({
            url:"setcategory.php",
            method:"POST",
            data:{category:name}
        }).done(function(){
            window.location.href='Todo.php';
        })
    }
    function modal(){
        document.getElementById("modal").style.display="flex";
    }
    function exitmodal(){
        document.getElementById("modal").style.display="none";
    }
    function send(){
        if(document.getElementById("category_input").value!=""){
            $.ajax()
        }
    }
    function reset(){
        document.getElementById("category_input").value="";
    }
    initial();
</script>