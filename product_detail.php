<link rel="stylesheet" href="style.css">
<?php
include ("header.php");



$link = mysqli_connect("localhost", "root", "", "bookstore");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code=0;
if (isset($_GET['id']))
	 $pro_code=$_GET['id'];

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";

$result = mysqli_query($link, $query);            //  اجراي پرس و جو


?>
<header>
    <style>
        div.info_pro{
            width: 400px;
            height: 380px;
            margin: auto;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 20px;
        }
        div.info_pro img{
            padding-top: 20px;
            width: 160px;
            display: block;
            margin: auto;
        }
        .we1{
            width: 250px;
            background-color: lightgray;
            border: none;
            height: 50px;
            border-radius: 30px;
            display: block;
            margin: auto;
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            transition: .6s;
            cursor: pointer;
        }
        .we1:hover{
            background-color: #ff0032;
            color: white;
        }
    </style>
</header>
<div class="info_pro">

  <?php


if ($row = mysqli_fetch_array($result)) {

?>


    <img src="images/products/<?php echo ($row['pro_image']) ?>"  />
       <h4  style="text-align: center"><?php echo ($row['pro_name']) ?></h4>
    <p style="text-align: center">Price : $ <?php echo ($row['pro_price']) ?></p>
    <p  style="text-align: center">Inventory: <span style="color:red;"><?php echo ($row['pro_qty']) ?></span></p>
    <p  style="text-align: center">Description :<span style="color:green;"> <?php echo ($row['pro_detail']) ?> </span></p>
    <a href="order.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;"><input class="we1" type="button" value="Buy and post"></a>
    <br/><br/>

    </td>

<?php


} // if

?>
</tr>
</div>
<script src="script.js"></script>
<?php
include ("footer.php");
?>

