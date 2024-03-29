<?php
session_start();
include("dboperation.php");
$obj = new dboperation;
if(isset($_POST["submit"]))
{
	$req_id= $_POST["req_id"];
	$from=$_POST['txt_from'];
	$to=$_POST['txt_to'];
	$paydate=date("Y/m/d");
	$status="advancepayment";
 	$amount=$_POST["txt_advance"];
	// $balance=$amount-$advanceamount;

	// $stime=$_SESSION["startime"];
	// $etime=$_SESSION["endtime"];
	// $command="payment pending";
	
	
	$sql = "insert into tbl_payment(`from_acc_no`, `to_acc_no`, `payment_date`, `amount`, `request_id`, `status`) values ('$from','$to','$paydate','$amount',$req_id,'$status')";
	$res = $obj->query($sql);

	if($res == 1) {
        $sql = "update tbl_request set status='$status' where request_id=$req_id";
        $res = $obj->query($sql);
		echo "<script>alert('Advance payment successfull.');  window.location='../mybooking.php'; </script>";
	} else {
		echo "<script>alert('Failed!'); window.location='../mybooking.php';</script>";
	}
	
	
		
}
//session_start();
//$customer_id=$_SESSION["cid"];
//$bookid=$_SESSION["booking_id"];
//$house = $_SESSION["house_name"];
//$contact = $_SESSION["contact_no"];
//$district=$_SESSION["district"];
//$place=$_SESSION["location"];	

// if(isset($_POST["submit"]))
// {
// 	$pay_amount=$_POST['txt_total'];
// 	$advance_amount=$_POST['txt_advance'];
// 	$balance=$pay_amount-$advance_amount;
	
	
// 	$date=date("Y-m-d");
// 	$commemt="payment success";
	
	
	
// 	$sql = mysqli_query($con, "SELECT * FROM tbl_cart WHERE cus_id = '$customer_id' AND status = 'pending'");
// 	$row = mysqli_fetch_array($sql);
	
// 	if($row>0)
// 	{
// 		$bid = $row["cart_id"];
// 		//$bdate = $row["date"];
// 		$amt = $row["tot_price"];
// 		$status = "Payment Success";
// 		$bcode=$date+"/"+$customer_id;
// 		$reqdate=date("Y-m-d",strtotime("+2 day"));
			
// 		$sql2 = mysqli_query($con, "INSERT INTO tbl_booking(cus_id,bdate,bcode,adamt,balamt,bstatus,reqdate,status)VALUES('$customer_id','$date','$bcode','$advance_amount','$balance','$status','$reqdate','pending')");	
	
	
// 			$sql1 = mysqli_query($con, "SELECT MAX(booking_id) as maxbid FROM tbl_booking");
// 			$row1 = mysqli_fetch_array($sql1);
			
// 			$maxbid = $row1["maxbid"];
// 			//$_SESSION["booking_id"]=$maxbid;
// 			$sql3 = mysqli_query($con, "SELECT * FROM tbl_cart_details WHERE cart_id = '$bid'");
// 			while($row3 = mysqli_fetch_array($sql3))
// 			{
// 				$product_id = $row3["cake_id"];
// 				$quantity = $row3["quantity"];
// 				$sql4=mysqli_query($con,"select * from tbl_stock where cake_id='$product_id'");
// 				$row4=mysqli_fetch_array($sql4);
// 				if($row4>0)
// 				{
// 					$curqty=$row4["s_quantity"];
// 					$finalqty=$curqty-$quantity;
// 					if($finalqty<1)
// 					{
// 						$sql4=mysqli_query($con,"UPDATE tbl_stock SET s_quantity=0 WHERE cake_id='$product_id'");
// 					}
// 					else
// 					{
// 					$sql4=mysqli_query($con,"UPDATE tbl_stock SET s_quantity='$finalqty' WHERE cake_id='$product_id'");
// 				}
// 				}
				
// 				$sql = mysqli_query($con, "INSERT INTO tbl_booking_detail(booking_id,cake_id,count)VALUES('$maxbid','$product_id','$quantity')");
// 			}
		
// 			$sql = mysqli_query($con, "DELETE FROM tbl_cart where cart_id='$bid'");
// 			$sql7 = mysqli_query($con, "DELETE FROM tbl_cart_details where cart_id='$bid'");
			
// 			//$sql3 = mysqli_query($con, "INSERT INTO tbl_delivery(house_name,Customer_id,District_id,place_id,delivery_date,contact)
// 			//VALUES('$house','$customer_id','$district','$place','$bdate','$contact')");
			
			
// 	//$sql5=mysqli_query($con,"insert into tbl_payment(customer_id,net_amount,booking_id,Payment_date,comment)values('$customer_id','$pay_amount','$maxbid','$date','$commemt')");
// 	//echo ("insert into tbl_payment(customer_id,net_amount,advance,Payment_date,comment)values('$custid','$pay_amount','$advance_amount','$date','$commemt')");
	
// 	// if($sql7)
// 	// 		{
				
// 	// 			require 'PHPMailerAutoload.php';
// 	// 	require 'credentials.php';
		
// 	// 	$mail = new PHPMailer;
		
// 	// 	$mail->SMTPDebug = 0;                               // Enable verbose debug output
		
// 	// 	$mail->isSMTP();                                      // Set mailer to use SMTP
// 	// 	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
// 	// 	$mail->SMTPAuth = true;                               // Enable SMTP authentication
// 	// 	$mail->Username = EMAIL;                 // SMTP username
// 	// 	$mail->Password = PASS;                           // SMTP password
// 	// 	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// 	// 	$mail->Port = 587;                                    // TCP port to connect to
		
// 	// 	$mail->setFrom(EMAIL, 'Cake Cart');
// 	// 	$mail->addAddress($_POST['txt_email']);     // Add a recipient
// 	// 	//$mail->addAddress('ellen@example.com');               // Name is optional
// 	// 	//$mail->addReplyTo('info@example.com', 'Information');
// 	// 	//$mail->addCC('cc@example.com');
// 	// 	//$mail->addBCC('bcc@example.com');
		
// 	// 	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// 	// 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// 	// 	$mail->isHTML(true);                                  // Set email format to HTML
		
// 	// 	$mail->Subject = 'Products Ordered Successfully';
// 	// 	$mail->Body    = 'Your products have been ordered successfully and the delivering process has been started. Please continue using our services and provide us feedback.';
// 	// 	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
// 	// 	if(!$mail->send()) 
// 	// 	{
// 	// 		echo 'Message could not be sent.';
// 	// 		echo 'Mailer Error: ' . $mail->ErrorInfo;
// 	// 	} 
// 	// 	else 
// 	// 	{
// 	// 		echo 'Message has been sent';
// 	// 		echo "<script>alert('Payment Done Successfully and your Products are Ordered!! We will contact through email!! ');window.location='../Customer/index.php';</script>";
// 	// 	}
		
// 	// 		}
// }
// }
		
?>
