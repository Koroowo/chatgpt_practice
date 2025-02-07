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
            <h2 class="m-0 cursor-pointer" onclick="window.location.href='index.php'">Menu</h2>
            <div class="top_right_logo_div">
                <img src="youyun.jpg" class="top_right_logo" alt="">
            </div>
            <div class="menu_list" id="menu_list">
                
            </div>
        </div>
        <div class="right_section">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="m-0" id="category_name"><?= $_SESSION["category_name"]?></h3>
                <button class="btn btn-danger" onclick="DeleteCategory();">Delete Category</button>
            </div>
            <div class="category_container" id="category_container">
                
            </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal_div" id="modal_div">
            <button class="modal_exit btn btn-danger" onclick="exitmodal()">X</button>
            <input type="text" id="category_input" name="category" class="mx-auto w-50 mb-4 form-control" placeholder="Category:" required>
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
            for(i=0;i<lists.length;i++){
                list +="<p class='btn m-0' onclick='Category(\""+ lists[i].list +"\")'>"+lists[i].list+"</p>";
            }
            document.getElementById("menu_list").innerHTML=list;
        })
    }
    function ListInitial(){
        $.ajax({
            url:"fetchlist.php",
            method:"GET"
        }).done(function(todos){

        })
    }
    function Category(name){
        $.ajax({
            url:"setcategory.php",
            method:"POST",
            data:{category:name}
        }).done(function(){
            window.location.href='todo.php';
        })
    }
    function DeleteCategory(){
        $.ajax({
            url:"delcategory.php",
            method:"POST"
        }).done(function(){
            initial();
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
            document.getElementById("modal").style.display="none";
            let input=document.getElementById("category_input").value;
            $.ajax({
                url:"addcategory.php",
                method:"POST",
                data:{category:input}
            }).done(function(){
                initial();
            })
        }else {
            alert("Please Input Your New Category Name.");
        }
    }
    function reset(){
        document.getElementById("category_input").value="";
    }
    initial();
</script>