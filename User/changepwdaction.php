<?php

session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$sql = "select * from tbl_login where loginid=".$_SESSION['loginid'];
$res = $obj->query($sql);
$display = mysqli_fetch_array($res);

$uname = $_POST["txtusername"];
$pwd = $_POST["txtpassword"];
$newpwd = $_POST["txtnewpassword"];
$confirmpwd = $_POST['txtconfirmpwd'];

if($pwd == $display["password"]) {
    if ($newpwd == $confirmpwd) {
        $sql1 = "update tbl_login set password='$newpwd' where loginid=".$_SESSION['loginid'];
        $res1 = $obj->query($sql1);

        if($res1 == 1) {
            echo "<script>alert('Password Changed Successfully.');window.location='userprofile.php' </script>";
        }else {
            echo "<script>alert('Failed.');window.location='userprofile.php' </script>";
        }
    }else {
        echo "<script>alert('Please ensure entered password is correct.');window.location='userprofile.php' </script>";
    }

} else {
    echo "<script>alert('Entered password is wrong.');window.location='userprofile.php' </script>";
}
