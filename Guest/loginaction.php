<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
require_once("../dboperation.php");

$obj = new dboperation();
$sql = "select * from tbl_login where username='$username' and password='$password'";
$res = $obj->query($sql);

if(mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_array($res);
    $_SESSION['loginid'] = $row['loginid'];
    $_SESSION['username'] = $row['username'];
    if($row["role"] == "admin" && $row["status"] == "confirm") {
        header("location:../Admin/index.php");
    } elseif($row["role"] == "customer" && $row["status"] == "confirm") {

        header("location:../User/index.php");
    }elseif($row["role"] == "customer" && $row["status"] == "Notconfirm"){
        echo "<script>alert('Please wait for verification.');
        window.location='index.php'</script>";
    } else {
        echo "<script>alert('Invalid Username/Password!!');
        window.location='login.php'</script>";
    }
}else{
    echo "<script>alert('Invalid Username/Password!!');
        window.location='login.php'</script>";
}
?>
