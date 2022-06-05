<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$username2 = $_POST['username'];
$password2 = $_POST['password'];
$email = $_POST['email'];
$_SESSION['email'] = $email;
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("failed" . mysqli_connect_error());
}

$sql = "SELECT * FROM `users` WHERE `username` = '$username2' AND `password` = '$password2' AND `email` = '$email'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
if ($row) {
    header("Location: profile.php");
    $_SESSION['state_login'] = true;
    $_SESSION['username'] = $row['username'];
    
    if ($row["type"] == 0)
        $_SESSION["user_type"] = "public";
    elseif ($row["type"] == 1){
        $_SESSION["user_type"] = "admin";
?>

<script type="text/javascript">
    <!--
    location.replace("admin/admin_product.php");
    -->
</script>
<?php
    }
    }
    else
        echo "not found a user";
    mysqli_close($sql);
    ?>