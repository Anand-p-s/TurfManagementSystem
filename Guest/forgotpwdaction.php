<?php
function generateRandomString($length = 10) 
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $randomString = substr(str_shuffle($characters), 0, $length);

   return $randomString;
}


?>


<?php
include_once("../dboperation.php");
$obj=new dboperation();
$uname=$_POST["txtusername"];
$sql="select l.*,c.* from tbl_login l inner join 
tbl_customer c on l.loginid=c.login_id where l.username='$uname'";

$result=$obj->query($sql);
$display=mysqli_fetch_array($result);
$row=mysqli_num_rows($result);
if($row==0)
{
    echo "<script>alert('Entered username is wrong....');window.location='forgotpwd.php' </script>"; 
}

else
{
$randomString = generateRandomString();
$sql1="update tbl_login set password='$randomString' where username='$uname'";
$result=$obj->query($sql1);

$bodyContent="Dear $uname, Your New Password is:$randomString";
$mailtoaddress=$display["email"];
require('phpmailer.php');

echo "<script>window.location='login.php'</script>";
    


}
?>