<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -22px;">
          <div class="content-wrapper">
            <!-- <div class="page-header">
              <h3 class="page-title">Form elements</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
                </ol>
              </nav>
            </div> -->
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">choose turf</h4>
                    <!-- <p class="card-description">Basic form layout</p> -->
                    <form class="forms-sample" action="" method="post">
                    <?php
                        include_once("../dboperation.php");
                        $obj=new dboperation();
                        $sql="select * from tbl_turf";
                        $res = $obj->query($sql);
                    ?>
                      <div class="form-group">
                      <select class="form-control" name="selturfid"  id="selturfid" onchange="this.form.submit()">
                        <option>---Select Turf---</option>
                            <?php
                                while($display= mysqli_fetch_array($res))
                                {
                            ?>
                        <option value="<?php echo $display["turf_id"]?>">
                                <?php echo $display["turf"]?>
                        </option>
                        <?php
                            }
                        ?>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        <?php
            if(isset($_POST["selturfid"]))
            {
              $turf_id1=$_POST["selturfid"];
        ?>
                      <script>
  
                        document.getElementById("selturfid").value=<?php echo $turf_id1; ?>;
  
                     </script>
            <a href="timeslot.php?turf_id=<?php echo $turf_id1?>" class="btn btn-outline-primary" style="margin-left: 717px;">Add Slots</a>
          <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Time Slots</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <?php
                          $turf_id=$_POST["selturfid"];
                          $sql = "SELECT * FROM `tbl_timeslot` where turf_id=$turf_id ";
                          $res = $obj->query($sql);
                          $s=1;
                        ?>
                        <tbody>
                        <?php
                          while($display=mysqli_fetch_array($res))
                          {
                        ?>
                        <tr>
                          <td><?php echo $s++ ?></td>
                          <td><?php echo $display["slot_time"] ; ?></td>
                          <td>
                            <a href="timeslotedit.php?slot_id=<?php echo $display["slot_id"]; ?>">
                            <button type="button" class="btn btn-primary">edit</button>
                            </a>
                            <a href="timeslotdelete.php?slot_id=<?php echo $display["slot_id"]; ?>">
                            <button type="button" class="btn btn-danger" name="btn_delete" onclick="return confirm('Do you want to delete?')">delete</button>
                            </a>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                        </tbody>
                      </table>
                    </div>
          <?php
          
                        }
                        
include("footer.php");
?>