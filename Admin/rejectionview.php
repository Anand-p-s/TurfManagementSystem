<?php
include('header.php');
include_once('../dboperation.php');
$obj = new dboperation();

$req_id = $_GET['req_id'];

$sql = "select * from tbl_request where request_id=$req_id";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);
?>
<br><br>
<div class="main-panel">
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Textarea1">Reject review</label>
                      <textarea class="form-control" id="Textarea1" rows="5"><?php echo $row['review'] ?></textarea>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->

<?php
include('footer.php');
?>
    
