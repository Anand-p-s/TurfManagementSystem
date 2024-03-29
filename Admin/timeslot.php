<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -22px;">
          <div class="content-wrapper">
            <div class="page-header">
              
              <nav aria-label="breadcrumb">
                
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Time Slot</h4>
                    <?php
                        require_once('../dboperation.php');
$turfid = $_GET['turf_id'];
$obj = new dboperation();
$sql = "select * from tbl_turf where turf_id=$turfid";
$res = $obj->query($sql);
$display = mysqli_fetch_array($res);
?>
                    <form class="forms-sample" action="timeslotaction.php" method="post">
                      <div class="form-group">
                        <label for="turf">Turf</label>
                        <input type="text" class="form-control" id="turf" placeholder="" value="<?php echo  $display["turf"] ?>"  />
                        <input type="hidden" value="<?php echo $turfid ?>" name="selturfid" >
                      </div>
                      <div class="form-group">
                        <label for="txt_time">Time</label>
                        <input type="text" class="form-control" id="txt_time" name="txt_time" placeholder="eg: 10:00 am to 11:00am" required/>
                      </div>
                       
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <!-- <button type="reset" class="btn btn-light">Cancel</button> -->
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <br><br><br><br><br><br><br><br><br><br><br>
          <?php
include("footer.php");
?>