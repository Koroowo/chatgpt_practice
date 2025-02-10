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
            <div class="list_container mx-auto mt-5 p-4">
                <div class="d-flex justify-content-end align-items-center">
                    <button class="btn btn-success" onclick="modal();"></button>
                </div>
                <table class="table table-striped overflow-auto mt-2" id="list_table">

                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal_div" id="modal_div">
            <button class="modal_exit btn btn-danger" onclick="exitmodal()">X</button>
            <input type="text" id="category_input" name="category" class="mx-auto w-50 mb-4 form-control" placeholder="Todo:" required>
            <select id="category_priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
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
            let todo="";
            document.getElementById("list_table").innerHTML="";
            for(i=0;i<todos.length;i++){
                if(todos[i].status==1){
                    if(todos[i].priority=='high'){
                        todo+="<tr style='background-color:rgb(255, 73, 109);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    }else if(todos[i].priority=='medium'){
                        todo+="<tr style='background-color:rgb(255, 235, 0);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    }else{
                        todo+="<tr style='background-color:rgb(118, 232, 137);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    } done
                }else{
                    if(todos[i].priority=='high'){
                        todo+="<tr style='background-color:rgb(255, 73, 109);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    }else if(todos[i].priority=='medium'){
                        todo+="<tr style='background-color:rgb(255, 235, 0);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    }else{
                        todo+="<tr style='background-color:rgb(118, 232, 137);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></div></tr>"
                    }
                }
                console.log(todos[i]);
            }
            document.getElementById("list_table").innerHTML=todo;
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
            window.location.href="index.php";
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
            let priority=document.getElementById("category_priority").value;
            $.ajax({
                url:"addtodo.php",
                method:"POST",
                data:{todo:input,priority:priority}
            }).done(function(){
                ListInitial();
            })
        }else {
            alert("Please Input Your New Category Name.");
        }
    }
    function reset(){
        document.getElementById("category_input").value="";
    }
    function check(el,id){
        if(el.checked){
            let row=el.closest("tr");
            row.querySelector("p").classList.add("done");
            let status=1;

        }else{
            let row=el.closest("tr");
            row.querySelector("p").classList.remove("done");
            let status=1;
        }
    }
    initial();
    ListInitial();
</script>