<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do網頁</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
</head>
<body>
    <div class="top_right_logo_div">
        <img src="youyun.jpg" class="top_right_logo" alt="">
    </div>
    <div class="todo_title mx-auto">
        <div class="todo_bar_div">
            <div class="todo_bar"></div>
            <div class="todo_bar"></div>
            <div class="todo_bar"></div>
        </div>
        <h2 class="mx-auto text-white m-0">Website Todo</h2>
        <button class="btn btn-success" onclick="location.href='add.php'"></button>
    </div>
    <div class="todo_container mx-auto" id="todo_lists">

    </div>
</body>
</html>
<script>
    $.ajax({
        url:"initial.php",
        method:"GET"
    }).done(function(array){
        console.log(array);
        if(array.length>0){
            document.getElementById("todo_lists").innerHTML=""
            let content="<table class='table table-striped' id='todo_lists'>";
            for(i=0;i<array.length;i++){
                content +="<tr class='d-flex'><td class='col-2'><input type='checkbox' class='input'></td><td class='col-8'><p class='m-0'>"+ array[i].task_name +"</p></td><td class='col-1'><button class='btn btn-warning'></button></td><td class='col-1'><button class='btn btn-danger'></button></td></tr>";
            }
            document.getElementById("todo_lists").innerHTML+=content+"</table>";
        }else{
            document.getElementById("todo_lists").innerHTML="<div class='empty_message'><h4 class='m-0'>No Tasks</h4></div>";
        }
    })
</script>