<?php
require_once('../dboperation.php');
$obj = new dboperation();

$game = $_POST['txt_game'];

$sql = "SELECT * from tbl_game where game='$game'";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);

if ($row['game'] != $game) {
    $sql = "insert into tbl_game (game) values('$game')";
    $res = $obj->query($sql);
    if ($res == 1) {
        echo "<script> alert('registered successfully!'); window.location='gamecategory.php' </script>";
    } else {
        echo "<script> alert('Failed to register!');window.location='gamecategory.php' </script>";
    }
} else {
    echo "<script> alert('Game already exists!');window.location='gamecategory.php' </script>";
}
