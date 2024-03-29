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
                <form class="forms-sample" action="changepwdaction.php" method="post">
                    <div class="form-group">
                        <label for="txt_name">Username</label>
                        <input type="text" class="form-control" id="txt_name" name="txtusername"
                             required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Current Password</label>
                        <input type="text" class="form-control" id="pwd" name="txtpassword"
                             required />
                    </div>

                    <div class="form-group">
                        <label for="pwd">New Password</label>
                        <p style="opacity: 80%;
    font-size: x-small;">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                                    more characters</p>
                        <input type="text" class="form-control" id="pwd" name="txtnewpassword"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                    </div>

                    <div class="form-group">
                        <label for="pwd">Confirm Password</label>
                        <input type="text" class="form-control" id="pwd" name="txtconfirmpwd"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                    </div>

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