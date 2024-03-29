<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -22px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Game Category</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Turf registration</h4> -->
                        <!-- <p class="card-description">Basic form layout</p> -->
                        <form class="forms-sample" action="gamecategoryaction.php" method="post">
                            <div class="form-group">
                                <!-- <label for="exampleInputUsername1">Game</label> -->
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="game name here..."
                                    name="txt_game" required/>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
include("footer.php");
?>