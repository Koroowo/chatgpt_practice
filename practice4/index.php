<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Generator</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <script src="jquery.js"></script>
</head>
<body>
    <div class="top_right_logo_div">
        <img src="youyun.jpg" class="top_right_logo" alt="">
    </div>
    <div class="quote_title mx-auto">
        <h2>Quote Generator</h2>
    </div>
    <div class="quote_container mx-auto">
        <div class="quote_div">

        </div>
        <button class="generate_quote" onclick="quote();">Get Quote</button>
    </div>
</body>
</html>
<script>
    function quote(){
        $.ajax({
            url:"generatequote.php",
            method:"GET",
            
        })
    }
    quote();
</script>