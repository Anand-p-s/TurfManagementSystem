<?php
require_once("../dboperation.php");
$obj = new dboperation();

$location_id=$_POST['location_id'];
$location=$_POST['txt_location'];

$sql = "UPDATE `tbl_location` set location='$location' WHERE location_id=$location_id";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('Location updated!'); window.location='locationview.php'; </script>";
} else {
    echo "<script> alert('Updation Failed'); window.location='locationview.php'; </script>";
}

?>