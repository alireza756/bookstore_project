<?php
//if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
//?>
<!--<script type="text/javascript">-->
<!---->
<!--location.replace("../index.php");	 // منتقل شود index.php به صفحه-->
<!---->
<!--</script>-->
<?php
//} // if پایان
include ("../header.php");
//?>
<link rel="stylesheet" href="../style.css">
<style>
    form input{
        display: block;
        margin: auto;
        margin-top: 20px;
        text-align: center;
        height: 30px;
        width: 200px;
        outline: none;
        border-radius: 15px;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
        border: none    ;
    }
    form{
        margin: auto;
        width: 400px;
        height: 550px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        margin-top: 90px;
    }
    textarea{
        display: block;
        margin: auto;
        margin-top: 20px;
        text-align: center;
    }
    h1{
        text-align: center;
        padding-top: 20px;

    }
</style>

<form name="add_product" action="action_admin_products.php"  method="POST" enctype="multipart/form-data" dir="rtl">
    <h1>Product Information</h1>
    <input type="text" id="pro_code" placeholder="product code" name="pro_code"/>
    <input type="text"  placeholder="product name" id="pro_name" name="pro_name"  /></td>
    <input type="text"  id="pro_qty" placeholder="product qty" name="pro_qty"  /></td>
    <input type="text"  id="pro_price" placeholder="product price" name="pro_price"   /></td>
    <input type="file"  placeholder="product image" id="pro_image" name="pro_image"  size="30" />
    <textarea id="pro_detail" placeholder="product caption" name="pro_detail" cols="35" rows="7" wrap="virtual"></textarea>
    <input style="cursor: pointer; background-color: #ff0032; color: white; font-size: 20px" type="submit" value="Add product"/>
    <input style="cursor: pointer; background-color: #ff0032; color: white; font-size: 20px" type="reset" value="New" />
  </form>

<script src="../script.js"></script>