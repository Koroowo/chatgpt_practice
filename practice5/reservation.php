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
        <a class="navigation mt-2 mx-4 text-white" href="usermessage.php">Visitor Messages</a>
        <a class="navigation mt-2 mx-4 text-white" href="reservation.php">Reservations</a>
    </div>
</body>
</html>
<script>
    document.getElementById("menu").addEventListener("click",function(){
        document.getElementById("box").classList.toggle("change");
    })
</script>