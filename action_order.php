<link rel="stylesheet" href="style.css">
<?php
include ("header.php");   // اضافه كردن پرونده header.php
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    ?>
    <script type="text/javascript">
        <!--
        location.replace("index.php");	 // منتقل شود index.php به صفحه
        -->
    </script>
    <?php
} // if پایان


$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];

$username = $_POST['username'];

$email = $_POST['email'];

$mobile = $_POST['mobile'];
$address = $_POST['address'];

$username = $_SESSION['username'];

//echo $pro_code . " |||| " . $pro_name . " |||| " . $pro_qty  . " |||| " .$pro_price  . " |||| " . $total_price  . " |||| " . $username  . " |||| " . $email  . " |||| " . $mobile  . " |||| " . $address ;
$link = mysqli_connect("localhost", "root", "", "bookstore");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());




$query = "INSERT INTO orders 
    (`id`,
     `username`,
     `orderdate`,
     `pro_code`,
     `pro_qty`,
     `pro_price`,
     `mobile`,
     `address`,
     `trackcode`,
     `state`
     ) VALUES
      ('4',
       '$username',
       '".date('y-m-d')."',
       '$pro_code',
       '$pro_qty',
       '$pro_price',
       '$mobile',
       '$address',
       '000000000000000000000000',
       '0')";
/*
0 تحت بررسی
1 آماده برای ارسال
2 ارسال شده
3 سفارش لغو شده است
*/



if (mysqli_query($link, $query) === true) {
    echo ("<p style='color:green;'><br/><b>Your order has been successfully registered in the system</b></p>");

    echo ("<p style='color:brown;'><br/><b>Dear user $username</b></p>");
    echo ("<p style='color:brown;'><br/><b>product $pro_name With code $pro_code To number / amount $pro_qty With base price $pro_price $ You have ordered</b></p>");
    echo ("<p style='color:red;'><br/><b> Amount payable for registered order $total_price $ </b></p>");

    echo ("<p style='color:blue;'><b>You will be contacted after reviewing the order and confirming it</b></p>");
    echo ("<p style='color:blue;'><b>The purchased product will be sent by post of the Islamic Republic of Iran according to the listed address</b></p>");
    echo ("<p style='color:blue;'><b>When receiving the product, check it and make sure that it is correct and healthy, then deliver the amount of the goods to the postman according to the invoice provided.</b><br/><br/></p>");

    $query = "UPDATE products SET pro_qty=pro_qty-$pro_qty WHERE pro_code='$pro_code'";
    mysqli_query($link, $query);

} else
    echo ("<p style='color:red;'><b>خطا در ثبت سفارش</b></p>" . mysqli_error() . mysqli_errno());


mysqli_close($link);

include ("footer.php");
?>
