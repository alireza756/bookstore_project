<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register/style.css">
</head>
<body>
   
    <h1>register page</h1>
    <form action="action_register.php" method="post">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <input type="email" placeholder="email" name="email">
        <!-- <input type="number" name="type" placeholder="0 -- 1"> -->
        <h1 id="captcha"></h1><input type="text" id="value" placeholder="captcha code"><input type="button" onclick="check1()" value="check">
        <input type="submit" id="submit" style="visibility: hidden;">
    </form>
    <p id="txt_form"></p>
    <script>
        let captchaValue = document.getElementById("captcha").innerHTML=Math.floor(Math.random() * 10000);
        function check1(){
        let inputValue = document.getElementById("value").value;
        if(captchaValue == inputValue){
            document.getElementById('submit').style.visibility = "visible";
        }
        else{
            document.getElementById('txt_form').innerHTML="Captcha code or one of the fields is incorrect";
        }
        
    }
    </script>
    <script src="script.js"></script>
</body>
</html>