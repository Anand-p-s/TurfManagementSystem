<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -22px;">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">District Registration</h4>
                        <form class="forms-sample" action="districtregaction.php" method="post">
                            <div class="form-group">
                                <!-- <label for="InputDistrict">District Name</label> -->
                                <input type="text" class="form-control" id="InputDistrict" placeholder="District name here..."
                                    name="txt_district" required/>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
include("footer.php");
?>