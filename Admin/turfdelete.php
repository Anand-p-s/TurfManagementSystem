<?php
include_once('../dboperation.php');
$obj = new dboperation();

$turfid = $_GET['turfid'];
$sql = "DELETE FROM `tbl_turf` WHERE turf_id=$turfid";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('Turf Removed successfully!'); window.location='turfview.php' </script>";
} else {
    echo "<script> alert('Failed to Remove!');window.location='turfview.php' </script>";
}
?>