<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Travel Portal</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
</head>
<body>
    <div class="top_banner">
        <h2 class="m-0">Travel Portal</h2>
        <div class="d-flex justify-content-end">
            <a class="navigation mt-2 mx-4" href="usermessage.php">Visitor Messages</a>
            <a class="navigation mt-2 mx-4" href="reservation.php">Reservations</a>
            <div class="menu_box" id="menu">
                <div class="menu_bar"></div>
                <div class="menu_bar"></div>
                <div class="menu_bar"></div>
            </div>
        </div>
    </div>
    <div class="box_menu" id="box">
        <a class="navigation mt-2 mx-4 text-white" onclick="location.href='usermessage.php'">Visitor Messages</a>
        <a class="navigation mt-2 mx-4 text-white" onclick="location.href='reservation.php'">Reservations</a>
    </div>
    <div class="d-flex justify-content-center my-4">
        <h2 class="mx-2">Visitor Message</h2>
        <button class="btn mx-2">Add Message</button>
    </div>
    <div class="usermessage mx-auto">
        <table class="bg-dark text-white table table-striped text-center" id="message_table">
        </table>
    </div>
    <div class="pop_up_bg" id="add">
        <div class="pop_up_modal">
            <button class="btn btn-danger pop_up_exit">X</button>
            <div class="d-flex justify-content-center">
                <h2 class="m-0 my-3">Add Message</h2>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <div class="d-flex justify-content-center mb-3 w-50 mx-auto">
                    <h4 class="m-0">Name: </h4>
                    <input type="text" id="name" class="modal_input form-control" placeholder="e.g. John">
                </div>
                <div class="d-flex justify-content-center my-3 w-50 mx-auto">
                    <h4 class="m-0">Email: </h4>
                    <input type="text" id="email" class="modal_input form-control" placeholder="e.g. example@gmail.com">
                </div>
                <div class="d-flex justify-content-center my-3 w-50 mx-auto">
                    <h4 class="m-0">Message: </h4>
                    <input type="text" id="message" class="modal_input form-control" placeholder="e.g. Thank you!">
                </div>
                <div class="d-flex justify-content-center my-3 w-50 mx-auto">
                    <button class="btn btn-success mx-3" onclick="send();">Send</button>
                    <button class="btn btn-warning mx-3" onclick="reset();">Reset</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    document.getElementById("menu").addEventListener("click",function(){
        document.getElementById("box").classList.toggle("change");
    })
    function initial(){
        $.ajax({
            url:"fetchmessage.php",
            method:"GET",
            dataType:"json"
        }).done(function(data){
            let tr="<tr class='d-flex'><th class='col-3'><p class='m-0'>Name</p></th><th class='col-3'><p class='m-0'>Email</p></th><th class='col-6'><p class='m-0'>Message</p></th></tr>";
            for(i=0;i<data.length;i++){
                tr+="<tr class='d-flex'><td class='col-3'>"+ data[i].name +"</td><td class='col-3'>"+ data[i].email +"</td><td class='col-6'>"+ data[i].message +"</td></tr>"
            }
            document.getElementById("message_table").innerHTML=tr;
        })
    }
    function send(){
        let name=document.getElementById("name");
        let email=document.getElementById("email");
        let message=document.getElementById("message");
        if(name!=""&&email!=""&&message!=""){
            $.ajax({
                url:"addmessage.php",
                method:"POST",
                data:{name:name,email:email,message:message}
            })
        }else{
            alert("Please Enter All The Input Boxes.");
        }
    }
    function reset(){
        document.querySelectorAll(".modal_input").forEach(function(inputs){
            inputs.value="";
        })
    }
    initial();
</script>