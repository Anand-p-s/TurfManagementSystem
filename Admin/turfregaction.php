<?php
require_once('../dboperation.php');
$obj = new dboperation();

$name = $_POST['txt_turf'];
$gameId = $_POST['selGame'];
$cost = $_POST['num_cost'];
$districtId = $_POST['ddldistrict'];
$locationId = $_POST['ddllocation'];
$desc = $_POST['txt_description'];
$date = date("Y/m/d");
$photo = $_FILES['img_turf']['name'];

move_uploaded_file($_FILES["img_turf"]['tmp_name'],'../uploads/'.$photo);

$sql = "insert into tbl_turf(`turf`,`cost`,`description`,`image`,`reg_date`,`district_id`,`location_id`,`game_id`) values('$name',$cost,'$desc','$photo','$date',$districtId,$locationId,$gameId)";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('Turf registered successfully!'); window.location='turfview.php' </script>";
} else {
    echo "<script> alert('Failed to register!');window.location='turfreg.php' </script>";
}
?>