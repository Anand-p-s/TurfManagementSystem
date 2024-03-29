<?php
include_once('../dboperation.php');
$obj = new dboperation();

$loginid = $_GET['login_id']; 

$sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid where C.login_id=$loginid";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);

$email=$row['email'];

$sql1 = "delete from tbl_login where loginid=$loginid";
$res1 = $obj->query($sql1);

if ($res1 == 1) {
    $bodyContent = "Dear user, You have been rejected for some technical reason. Please try to create an account again.";
    $mailtoaddress = $email;
    require('userrejectmailer.php');
} else {
    echo "<script> alert('Failed!'); window.location='customerview.php'; </script>";
}

?>