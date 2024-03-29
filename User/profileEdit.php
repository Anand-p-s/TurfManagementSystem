<?php
include('header.php');
?>
<br><br><br>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card" style="margin-left: 50%;">
            <div class="card-body">
                <!-- <h4 class="card-title">Details Edit form</h4> -->
                    <!-- <p class="card-description">Basic form layout</p> -->
                <form class="forms-sample" action="profileEditaction.php" method="post">
                    <?php
                      require_once('../dboperation.php');
$obj = new dboperation();
$loginid = $_SESSION['loginid'];
$sql = "select * from tbl_customer C inner join tbl_district D on C.district_id=D.district_id inner join tbl_location L on C.location_id=L.location_id where C.login_id=$loginid";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);
?>
                    <div class="form-group">
                        <label for="txt_name">Full name</label>
                        <input type="text" class="form-control" id="txt_name" name="txt_name"
                            pattern="^[A-Za_z][A-Za-z -]+$" value="<?php echo $row['cust_name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?php echo $row['email']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="txt_contact">Contact</label>
                        <input type="text" class="form-control" id="txt_contact" name="txt_phone"
                            pattern="[0-9]{10}" required value="<?php echo $row['phone_no']; ?>" />
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" />
                      </div> -->
                    <!-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" /> Remember me </label>
                      </div> -->
                    <button type="submit" class="btn btn-primary mr-2"> Update </button>
                    <!-- <a href="userprofile.php"><button class="btn btn-light">Cancel</button></a> -->
                </form>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br>
<?php
        include('footer.php');
?>