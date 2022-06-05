<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>

        .box_profile{
            width: 300px;
            height: 300px;
            margin: auto;
            display: block;
            margin-top: 230px ;
            border: 2px solid white;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            position: relative;

        }
        .box_profile .profile_pic img{
            width: 100px;
            display: block;
            margin: auto;
            margin-top: 30px;
        }
        .box_profile .profile_name p{
            text-align: center;
            margin-top: 20px;
            font-size: 21px;
        }
        .box_profile .logout input{
            width: 150px;
            height: 30px;
            background-color: #ff0032;
            color: white;
            margin: auto;
            display: block;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 30px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        border: none    ;
            font-size: 17px;

        }
        .box_profile .logout a{
            text-decoration: none   ;

        }
        .box_profile .update{
            position: absolute;
            left: 10px;
            top: 10px;
            cursor: pointer;
        }
        .box_profile .update img{
            width: 30px;

        }
    </style>
</head>
<body>
<?php

?>


    <div class="box_profile">
        <div class="update"><img src="settings.png" alt="" onclick="out()"></div>
        <div class="profile_pic"><img src="cropped-favicon-1-192x192.png" alt=""></div>
        <div class="profile_name"><p>username :<?php echo (" {$_SESSION['username']}")?></p></div>
        <div class="profile_name"><p>email :<?php echo (" {$_SESSION['email']}")?></p></div>
        <div class="logout"><a href="logout.php"><input type="button" value="logout"></a></div>
    </div>
    <script src="script.js"></script>
<script>
    function out(){
    location.replace("edit_profile.php");}
</script>
</body>
</html>