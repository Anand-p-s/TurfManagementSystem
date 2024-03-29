<?php
include("header.php");
?>
<br><br><br>
<div class="expert_doctors_area">
    <div class="container">
        <div class="row justify-content-center ">

        </div>
        <div class="row ">
            <form name="f1" method="post" action="changepwdaction.php">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="col-xl-9">
                            Username: <input type="text" name="txtusername" placeholder=" Your username">
                        </div>
                        <div class="col-xl-3">
                            Password <input type="text" name="txtpassword" placeholder="current password">
                        </div>
                        <div class="col-xl-6">
                            New Password <input type="text" name="txtnewpassword" placeholder="New password">
                        </div>

                        <div class="col-xl-6">
                            Confirm Password <input type="text" name="txtconfirmpwd" placeholder="Confirm Password">
                        </div>
                        <br>
                        <br>
                        <div class="col-xl-6">
                            <input type="submit" text="changepassword" value="changepassword">
                        </div>
            </form>

            <div class="social_links">

            </div>
        </div>
    </div>
</div>
<div>
</div>


</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php
include("footer.php");
?>