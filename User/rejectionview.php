<?php
include('header.php');
include_once('../dboperation.php');
$obj = new dboperation();

$req_id = $_GET['req_id'];

$sql = "select * from tbl_request where request_id=$req_id";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);
?>

<br>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Reject review</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['review'] ?></textarea>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include('footer.php');
    ?>
