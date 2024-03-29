<?php
require_once('../dboperation.php');
$obj = new dboperation();

$turfid = $_POST['turfid'];
$name = $_POST['txt_turf'];
$gameId = $_POST['selGame'];
$cost = $_POST['num_cost'];
$districtId = $_POST['ddldistrict'];
$locationId = $_POST['ddllocation'];
$desc = $_POST['txt_description'];
// $date = date("Y/m/d");
$photo = $_FILES['img_turf']['name'];

move_uploaded_file($_FILES["img_turf"]['tmp_name'],'../uploads/'.$photo);

$sql = "update tbl_turf set turf='$name',cost=$cost,description='$desc',image='$photo',district_id=$districtId,location_id=$locationId,game_id=$gameId where turf_id=$turfid";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('Turf Details Updated successfully!'); window.location='turfview.php' </script>";
} else {
    echo "<script> alert('Failed to edit!');window.location='turfview.php' </script>";
}
?>