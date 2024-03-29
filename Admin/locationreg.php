<?php
include("header.php");
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <!-- <h3 class="page-title">Form elements</h3> -->
              <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
                </ol> -->
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Location Registration</h4>
                    <!-- <p class="card-description">Basic form layout</p> -->
                    <form class="forms-sample" action="locationregaction.php" method="post">
                    <?php
                      require_once("../dboperation.php");
$obj = new dboperation();
$district_id = $_GET["district_id"];
$sql = "SELECT * from tbl_district where district_id='$district_id ' ";
$res = $obj->query($sql);
$display = mysqli_fetch_array($res);
?>
                      <div class="form-group">
                        <label for="exampleInputUsername1">District</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="" value="<?php echo  $display["district_name"] ?>"  />
                        <input type="hidden" value="<?php echo $district_id ?>" name="seldistrictid" >
                      </div>
                      <div class="form-group">
                        <label for="inputLocation">Location name</label>
                        <input type="text" class="form-control" id="inputLocation" required name="locationname" pattern="^[A-Za_z][A-Za-z -]+$"/>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <br><br><br><br><br><br>
          <?php
include("footer.php");
?>