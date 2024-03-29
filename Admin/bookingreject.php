<?php
include('header.php');
$req_id = $_GET['request_id'];
?>
<div class="main-panel">
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
<form class="forms-sample" action="bookingrejectaction.php" method="post">
    Remark <br>
    <textarea name="remark" id="remark" cols="30" rows="10">

    </textarea>
    <input type="hidden" name="req_id" value="<?php echo $_GET['request_id']; ?>">
    <br>
    <input type="submit" value="submit" class="btn btn-primary mr-2">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
