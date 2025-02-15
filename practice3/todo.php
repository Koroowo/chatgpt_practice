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
                    <button class="btn btn-success" onclick="addmodal();"></button>
                </div>
                <table class="table table-striped overflow-auto mt-2">
                    <tbody id="list_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="add_modal">
        <div class="modal_div" id="modal_div">
            <button class="modal_exit btn btn-danger" onclick="exitmodal()">X</button>
            <input type="text" id="category_input" name="category" class="mx-auto w-50 mb-4 form-control" placeholder="Todo:" required>
            <select id="category_priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-3" onclick="add();">Add</button>
                <button type="button" class="btn btn-warning mx-3" onclick="reset();">Reset</button>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_modal">
        <div class="modal_div" id="modal_div">
            <button class="modal_exit btn btn-danger" onclick="exitmodal()">X</button>
            <input type="text" id="edit_input" name="category" class="mx-auto w-50 mb-4 form-control" placeholder="Todo:" required>
            <select id="edit_priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-3" onclick="edit();">Edit</button>
                <button type="button" class="btn btn-warning mx-3" onclick="reset();">Reset</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    let gb_todos=[];
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
            gb_todos=todos;
            let todo="";
            document.getElementById("list_table").innerHTML="";
            for(i=0;i<todos.length;i++){
                if(todos[i].status==1){
                    if(todos[i].priority=='high'){
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(255, 73, 109);'><div class='d-flex'><td class='col-2'><input type='checkbox' checked onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    }else if(todos[i].priority=='medium'){
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(255, 235, 0);'><div class='d-flex'><td class='col-2'><input type='checkbox' checked onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    }else{
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(118, 232, 137);'><div class='d-flex'><td class='col-2'><input type='checkbox' checked onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0 done'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    } 
                }else{
                    if(todos[i].priority=='high'){
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(255, 73, 109);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    }else if(todos[i].priority=='medium'){
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(255, 235, 0);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    }else{
                        todo+="<tr class='list_sort' id="+ todos[i].id +" style='background-color:rgb(118, 232, 137);'><div class='d-flex'><td class='col-2'><input type='checkbox' onclick='check(this,"+ todos[i].id +")'></td><td class='col-8'><p class='m-0'>"+todos[i].task+"</p></td><td class='col-1'><button class='btn btn-warning' onclick='editmodal("+todos[i].id +")'></button></td><td class='col-1'><button class='btn btn-danger' onclick='DelTodo("+ todos[i].id +")'></button></td></div></tr>"
                    }
                }
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
    function addmodal(){
        document.getElementById("add_modal").style.display="flex";
    }
    function editmodal(id){
        document.getElementById("edit_modal").style.display="flex";
        for(i=0;i<gb_todos.length;i++){
            if(gb_todos[i].id==id){
                localStorage.setItem("edit_todo",id);
                document.getElementById("edit_input").value=gb_todos[i].task;
                document.getElementById("edit_priority").value=gb_todos[i].priority;
            }
        }
    }
    function exitmodal(){
        document.querySelectorAll(".modal").forEach(function(modal){
            modal.style.display="none";
        })
    }
    function add(){
        if(document.getElementById("category_input").value!=""){
            document.getElementById("add_modal").style.display="none";
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
            alert("Please Input Your New Todo Name.");
        }
    }
    function edit(){
        if(document.getElementById("edit_input").value!=""){
            document.getElementById("edit_modal").style.display="none";
            let input=document.getElementById("edit_input").value;
            let priority=document.getElementById("edit_priority").value;
            let id=localStorage.getItem("edit_todo");
            $.ajax({
                url:"edittodo.php",
                method:"POST",
                data:{todo:input,priority:priority,id:id}
            }).done(function(){
                ListInitial();
            })
        }else{
            alert("Please Input Your New Todo Name.");
        }
    }
    function reset(){
        document.querySelectorAll("input").forEach(function(inputs){
            inputs.value="";
        })
    }
    function check(el,id){
        if(el.checked){
            let row=el.closest("tr");
            row.querySelector("p").classList.add("done");
            let status=1;
            $.ajax({
                url:"statustodo.php",
                method:"POST",
                data:{status:status,id:id}
            })
        }else{
            let row=el.closest("tr");
            row.querySelector("p").classList.remove("done");
            let status=0;
            $.ajax({
                url:"statustodo.php",
                method:"POST",
                data:{status:status,id:id}
            })
        }
    }
    function DelTodo(id){
        $.ajax({
            url:"deltodo.php",
            method:"POST",
            data:{id:id}
        }).done(function(){
            ListInitial();
            let sorts=document.querySelectorAll(".list_sort");
            let sort_array=[];
            for(i=0;i<sorts.length;i++){
                sort_array.push(sorts[i].id);
            }
            console.log(sort_array);
            $.ajax({
                url:"sorttodo.php",
                method:"POST",
                data:{array:sort_array}
            })
        })
    }
    $("#list_table").sortable({
        cursor:"pointer",
        opacity:0.6,
        update: function(){
            let sorts=document.querySelectorAll(".list_sort");
            let sort_array=[];
            for(i=0;i<sorts.length;i++){
                sort_array.push(sorts[i].id);
            }
            $.ajax({
                url:"sorttodo.php",
                method:"POST",
                data:{array:sort_array}
            }).done(function(){
                ListInitial();
            })
        }
    });
    initial();
    ListInitial();
</script>