<?php
require_once("../dboperation.php");
$obj=new dboperation();
$customername=$_POST["txt_name"];
$district_id=$_POST["ddldistrict"];
$location_id=$_POST["ddllocation"];
$email=$_POST["email"];
$phone=$_POST["txt_phone"];
$date = date("Y/m/d");

$username=$_POST["txt_username"];
$password=$_POST["password"];

$sql="Select * from tbl_login where username='$username'";
	$res=$obj->query($sql);
    $rows=mysqli_num_rows($res);
  	echo $rows;
  		if($rows==1)
		{
            echo "<script>alert('Username already exist')</script>";
		}
		else
		{
            echo $sql="insert into tbl_login (username,password,role,status) VALUES ('$username', '$password', 'customer', 'Notconfirmed')";
            $res=$obj->query($sql);
            if($res==1)
            {

            $loginid=mysqli_insert_id($obj->con);

            echo $sql="insert into tbl_customer (cust_name,email,phone_no,district_id,location_id,login_id,reg_date)
            VALUES ('$customername', '$email', '$phone', $district_id, $location_id,$loginid,'$date')";
            $result=$obj->query($sql);


            if($result==1)
            {
	            echo "<script>alert('Registered success. Kindly wait for verification.');  window.location='login.php'; </script>";
            }

            else
            {
                echo $s="delete from login where loginid='$loginid'";
                $res2=$obj->query($s);
                echo "<script>alert('Failed'); window.location='customerreg.php';</script>";
            }
            }
        }
?>