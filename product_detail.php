<?php include("header.php"); ?> 
    <div class="container wow fadeInUp" style="background-color:red; margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $get_id = $_GET['id'];
                
                    $query = "SELECT * FROM products WHERE product_id = '$get_id'";
                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                    foreach($run_query as $product){
                ?>
                <h1 id="header__black" style="padding-top: 10px;"><?php echo $product['product_name']; ?></h1>
                <img src="assets/img/products/<?php echo $product['product_img']; ?>" class="img-responsive" alt="..." style="width: 100%;">
                
                <?php
                    }
                ?>
                
                
            </div>
        </div>
      </div>
<?php include("footer.php"); ?>