<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>地點查詢網頁</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
</head>
<body>
    <div class="top_right_logo_div">
        <img src="youyun.jpg" class="top_right_logo" alt="">
    </div>
    <div class="search_div mx-auto">
        <h2 class="mx-auto text-white">查詢地點 :</h2>
        <input type="text" id="input" class="form-control">
    </div>
    <div class="result_div mx-auto text-white" id="result_div">

    </div>
</body>
</html>
<script>
    document.getElementById("input").addEventListener('input',function(){
        let input=this.value;
        $.ajax({
            url:"ajax.php",
            method:"POST",
            data:{input:input}
        }).done(function(result){
            if(result.length > 0){
                document.getElementById("result_div").innerHTML="";
                for(i=0;i<result.length;i++){
                    let h4=document.createElement("h4");
                    h4.innerHTML=result[i].name;
                    document.getElementById("result_div").appendChild(h4);  
                }
            }else{
                document.getElementById("result_div").innerHTML="<h4 class='m-0'>No results found</h4>"
            }
        });
    })
</script>