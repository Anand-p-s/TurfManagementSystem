<?php

$district = $_POST['txt_district'];

require_once("../dboperation.php");
$obj = new dboperation();

$sql1 = "SELECT * from tbl_district where district_name='$district'";
$res1 = $obj->query($sql1);
$row = mysqli_fetch_array($res1);

if ($row['district_name'] == $district) {
    echo "<script> alert('District Already Exist!');window.location='districtreg.php' </script>";
} else {
    $sql = "INSERT INTO tbl_district(district_name) VALUES ('$district')";
    $res = $obj->query($sql);

    if ($res == 1) {
        echo "<script> alert('Data inserted successfully!'); window.location='districtreg.php' </script>";
    } else {
        echo "<script> alert('Failed to insert!');window.location='districtreg.php' </script>";
    }
}
