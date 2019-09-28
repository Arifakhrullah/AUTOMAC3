<?php require("header.php");?>

<div class="container">
    <?php 
        if(!isset($_GET['admin']) || !isset($_SESSION['user_name'])){
            echo '<div class="row">
                    <div class="col-md-10 col-md-offset-1 text__gold">
                        <h1>Cannot access, Please log in.</h1>
                    </div>
                </div>';
        } else {
    ?>
<!--    <h1 class="text__gold">Admin Dashboard</h1>-->
    <div class="row">
        <div class="col-md-2 col-sm-12 col-xs-12">
            <div class="admin-menu">
                <ul class="nav nav-pills nav-stacked"> 
                    <li class="active"><a data-toggle="tab" href="#sectionA"><i class="fas fa-tachometer-alt"></i>Clothing</a></li>
                    <li><a data-toggle="tab" href="#sectionB"><i class="fas fa-th-list"></i>Categories</a></li>
                    <li><a data-toggle="tab" href="#sectionC"><i class="fas fa-tshirt"></i>Dashboard</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <div class="tab-content">
                <div id="sectionA" class="tab-pane fade in active">
                    <?php include("admin/clothing.php"); ?>
                </div>
                <div id="sectionB" class="tab-pane fade">
                    <?php include("admin/categories.php"); ?>
                </div>
                <div id="sectionC" class="tab-pane fade">
                    <?php include("admin/dashboard.php"); ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        } 
    ?>
</div>
    
<?php require("footer.php");?>