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
        <h2 class="mx-auto text-white m-0">Add Todo</h2>
        <button class="btn btn-danger" onclick="location.href='index.php'"></button>
    </div>
    <div class="todo_container mx-auto">
        <div class="mt-4">
            <input type="text" class="form-control w-50 mx-auto" id="task" placeholder="Task:">
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-success" onclick="send();"></button>
                <button class="btn btn-warning" onclick="clearinput();"></button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function clearinput(){
        document.getElementById("task").value="";
    }
    function send(){
        if(document.getElementById("task").value!=""){
            
        }else{
            alert("Please Insert Your Task.");
        }
    }
</script>