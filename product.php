<?php include("header.php"); ?>
	<div class="container">
        <div class="row">
		<?php
            $id = $_GET['id'];
        
            $query = "SELECT p.* FROM categories AS c INNER JOIN products AS p ON c.category_id = p.product_category WHERE p.product_id = '$id'";
            $run_query = mysqli_query($con, $query);
        
            foreach($run_query as $product){
                //The "width: 100%" is important to force image size to keep aspect ratio
                echo '<div class="col-md-6 wow fadeIn">
                        <img class="img-responsive" style="width: 100%;" src="assets/img/products/'.$product['product_img'].'">
                    </div>
                    <div class="col-md-6 wow fadeIn" style="padding-left: 1.5rem; ">
                        <div style="background-color: #f7e580; padding: 15px;">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <p class="text-muted" style="font-size: 1.2rem; padding:0;margin:0;">Product ID: '.$product['product_id'].'</p> 
                                    <h1 style="margin-top: 0;" class="product_name">'.strtoupper($product['product_name']).'</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <h1 style="margin-top: 10px;" class="product_price pull-right">$'.$product['product_price'].'</h1>
                                </div>
                            </div>
                            <br>
                            <h4><b>Description</b></h4>
                    ';
        ?>
        <?php
                if($product['product_desc'] === false || $product['product_desc'] == NULL || $product['product_desc'] == ''){
                    echo '<p class="text-muted">No description available.</p>';
                } else {
                    echo '<p>'.$product['product_desc'].'</p>';
                } 
        ?>
            <?php
                echo '<br><h4><b>Sizes</b></h4>';
                if($product['product_size'] != ''){
                    $size = explode(".", $product['product_size']);
                    foreach ($size as $sizes) {
                        echo '<p class="size-badge">'.$sizes.'</p>
                        ';
                    }     
                } else {
                    echo '<p class="text-muted">No size are listed, will be updated soon.</p>';
                }
                
            echo '  </div>
                </div>';
            }
        ?>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                <h3 class="text__gold visible-md visible-lg">Other Product</h3>
                <?php
                    $query = "SELECT p.* FROM categories AS c INNER JOIN products AS p ON c.category_id = p.product_category ORDER BY RAND() LIMIT 6";

                    $run_query = mysqli_query($con, $query);
                
                    foreach($run_query as $product){
                        echo '
                        <a href="product.php?id='.$product['product_id'].'">
                            <div class="col-lg-2 col-md-2 visible-md visible-lg suggestion wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-responsive" src="assets/img/products/'.$product['product_img'].'">
                                <h4 class="text__gold">$'.$product['product_price'].'</h4>
                            </div>
                        </a>
                        ';
                    }
                ?>
            </div>
        </div>
	</div>

    
<?php include("footer.php"); ?>