<link rel="stylesheet" href="style.css">
<style>
    .user_info{
        width: 400px;
        height: 800px;
        margin: auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 20px;
    }
    .user_info input{
        text-align: center;
        margin: auto;
        display: block;
        margin-top: 20px;
        height: 25px;
        width: 200px;
        border: none    ;
        border-radius: 20px;
        outline: none   ;
    }
    .user_info p{
        text-align: center;
        margin-top: 12px;
    }
    .user_info p:nth-child(1){
        padding-top: 30px;
    }
    .user_info textarea{
        text-align: center;
        margin: auto;
        display: block;
    }
    div.alert{
        display: block;
        width: 400px;
        height: 380px;
        margin: auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 20px;
        margin-top:  180px;
    }
    div.alert img{
        width: 100px;
        display: block;
        margin: auto;
        margin-top: 20px;
    }
    div.alert h1{
        text-align: center;
        margin-bottom: 30px;
    }
    div.alert input{
        display: block;
        margin: auto;
    }
    div.alert a{
        text-decoration: none;
    }
    .we1{
        width: 350px;
        background-color: lightgray;
        border: none;
        height: 50px;
        border-radius: 30px;
        display: block;
        margin: auto;
        text-align: center;
        margin-top: 40px;
        font-size: 15px;
        transition: .6s;
        cursor: pointer;
    }
    .we1:hover{
        background-color: #ff0032;
        color: white;
    }
</style>
<?php
include ("header.php");


$link = mysqli_connect("localhost", "root", "", "bookstore");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id']))
    $pro_code = $_GET['id'];

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    ?>
    <div class="alert">
    <!-- /.alert -->
        <div class="logo">
        <img src="alert.png" alt="">
        </div>
    <h1>To buy the selected product by mail, you must enter the site</h1>
    <a href='login.php'><input class="we1" type="button" value="Click here if you are a member of the store"></a><br>
    <a href='register.php'><input class="we1" type="button" value="Click here if you are not a member of the store"></a>
    </div>
    <?php
    exit();
}


//پرس و جوي  مشخصات محصول انتخابي

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";

$result = mysqli_query($link, $query);     // اجراي پرس و جو



?>

    <form name="order" action="action_order.php"  method="POST" >

<?php


if ($row = mysqli_fetch_array($result)) {    //$row ذخيره ركورد  اطلاعات محصول  در آرايه

    ?>


        <div class="user_info">
            <p>Product Code</p>
        <input type="text" id="pro_code" name="pro_code" value="<?php echo ($pro_code); ?>" style="background-color: lightgray;" readonly  />



            <p>Product Name</p>
            <input type="text" style="background-color: lightgray;" id="pro_name" name="pro_name" value="<?php echo ($row['pro_name']); ?>"  readonly  />



            <p>The number or amount requested </p>
            <input type="text" style="background-color: lightgray;" id="pro_qty" name="pro_qty" onchange="calc_price();"  />



            <p>Price ( $ )</p>
            <input type="text" style="background-color: lightgray;" id="pro_price" name="pro_price" value="<?php echo ($row['pro_price']); ?>"  readonly  />




            <p>The amount payable ( $ )</p>
            <input type="text" style="background-color: lightgray;" id="total_price" name="total_price" value="0"  readonly  />



        <script type="text/javascript">
            <!--
            function calc_price()
            {
                var pro_qty=<?php echo ($row['pro_qty']); ?>;
                var price= document.getElementById('pro_price').value;
                var count= document.getElementById('pro_qty').value;
                var total_price;

                if (count>pro_qty){
                    alert('تعداد موجودی انبار کمتر از درخواست شما است!!');
                    document.getElementById('pro_qty').value=0;
                    count=0;
                }

                if (count==0 || count=='')
                    total_price=0;
                else
                    total_price=count*price;

                document.getElementById('total_price').value= total_price;

            }

            -->
        </script>


        <?php
        $query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
        $result = mysqli_query($link, $query);
        $user_row = mysqli_fetch_array($result);
        ?>



            <p>Customer name </p>
                <input type="text" id="username" name="username" value="<?php echo ($user_row['username']); ?>" style="background-color: lightgray;" readonly />



            <p>Email </p>
            <input type="text" style="background-color: lightgray;" id="email" name="email" value="<?php echo ($user_row['email']); ?>"  readonly  />



            <p>Phone Number </p>
            <input type="text" style="background-color: lightgray;" id="mobile" name="mobile" value="09"  />



            <p>Address </p>
            <textarea id="address" name="address"  cols="30" rows="3" wrap="virtual"></textarea>



            <input style="cursor: pointer; width: 200px; height: 30px;" type="button" value="Buy the product" onclick="check_input();" />

        </div>

        <script type="text/javascript">
            <!--
            function check_input()
            {
                var r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
                if (r == true) {
                    var validation=true;
                    var count= document.getElementById('pro_qty').value;
                    var mobile= document.getElementById('mobile').value;
                    var address= document.getElementById('address').value;

                    if (count==0 || count=='')
                        validation=false;

                    if (mobile.length<11)
                        validation=false;

                    if (address.length<15)
                        validation=false;

                    if (validation)
                        document.order.submit();
                    else
                        alert('برخی از ورودی های فرم سفارش محصول به درستی پر نشده‌اند');
                }
            }
            -->
        </script>
        <style>
            .product{
                display: block;
                width: 300px;
                height: 300px;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                margin: auto;
                margin-top: 30px;
            }
            .product p{
                text-align: center;
            }
            .product img{
                display: block;
                margin: auto;
                width: 150px;
            }
        </style>
<div class="product">

                    <img src="images/products/<?php echo ($row['pro_image']) ?>" width="250px" height="120px"  />
    <p style="color: brown;"><?php echo ($row['pro_name']) ?></p><br>
    <p>Price : $ <?php echo ($row['pro_price']) ?></p><br>
    <p>Inventory: <span style="color:red;"><?php echo ($row['pro_qty']) ?></span></p><br>
    <p>Description : <span style="color:green;">

    <?php
    $count = strlen($row['pro_detail']);
    echo (substr($row['pro_detail'], 0, (int)($count / 4)));
    ?>
    ...</span></p>
</div>
    </form>
    <script src="script.js"></script>
    <?php
} // if


include ("footer.php");
?>