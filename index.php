<?php
include("header.php");

$link = mysqli_connect("localhost", "root", "", "bookstore");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM products";

$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="cropped-favicon-1-32x32.png" sizes="32x32" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Alireza Cheraghliei</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header_bottom">
        <p class="item-1">All our dreams can come true, if we have the courage to pursue them.</p>

        <p class="item-2">The secret of getting ahead is getting started.</p>
        
        <p class="item-3">It’s hard to beat a person who never gives up.</p>
        <div class="box">
            <div class="box1">
                <img src="assets/png1.png" alt="book">
            <h1>High print quality</h1>
            </div>
            <div class="box2">
                <img src="assets/png2.png" alt="book">
            <h1>24-hour support</h1>
            </div>
            <div class="box3">
                <img src="assets/png3.png" alt="book">
            <h1>fast sending</h1>
            </div>
        </div>
    </div>
    <h1 class="title-h1"  id="products">Products</h1>

    <div class="products">


            <?php

            $counter = 0;
            while ($row = mysqli_fetch_array($result)) {
                $counter++;
                ?>



        <div class="product1">
            <img style="height: 110px ; width: 150px" src="images/products/<?php echo ($row['pro_image']) ?>" alt="">
                    <p style="text-align: center"><?php echo ($row['pro_name']) ?></p>
                    <a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">
                    </a>
            <p style="text-align: center ; margin-top: 20px" >Price : $<?php echo ($row['pro_price']) ?></p>

            <p style="text-align: center">Inventory: <span style="color:red;"><?php echo ($row['pro_qty']) ?></span></p>

            <p style="text-align: center">Description : <span style="color:green;"> <?php echo (substr($row['pro_detail'],0,240)) ?> ...</span></p>

                    <b><a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;"><input type="button" value="Add to cart"></a></b>

        </div>

                <?php
                if ($counter % 3 == 0)
                    echo ("</tr><tr>");
            } // while

            if ($counter % 3 != 0)
                echo ("</tr>");

            ?>
            </div>

            <?php
    include("footer.php");
    ?>
    <script src="script.js"></script>
    <script type="text/javascript" src="glass.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".box1"), {
            max: 25,
            speed: 400
        });

        VanillaTilt.init(document.querySelector(".box2"), {
            max: 25,
            speed: 400
        });

        VanillaTilt.init(document.querySelector(".box3"), {
            max: 25,
            speed: 400
        });
    </script>
</body>
</html>