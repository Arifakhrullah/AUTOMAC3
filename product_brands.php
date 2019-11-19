<?php include("header.php"); ?>
        <div class="upper">
            <div class="container wow fadeIn" data-wow-delay="0.1s">
                <?php
                    $get_id = $_GET['id'];
                
                    $query = "SELECT * FROM services WHERE service_nameShort = '$get_id'";
                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                    foreach($run_query as $service){
                        echo '<h1 id="header__black" style="padding-top: 20px;">'.$service['service_name'].'</h1>';
                    }
                ?>
                
                <div class="row text__black">
                    <div class="col-md-12" style="margin-left: 2.5rem; margin-right: 2.5rem; padding-left: 0;">
                        
                        <div class="clothing-menu">
                            <ul>
                                <li class="active" data-filter="*">All Product</li>
                                <?php
                                    $query = "SELECT * FROM products WHERE product_serviceCategory='$get_id'";
                            
                                
                                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));
                                
                                    
                                    $num_rows = mysqli_num_rows($run_query);
                                    
                                    if($num_rows != 0){
                                        $query = "SELECT DISTINCT brand_name FROM brands WHERE brand_service='$get_id'";
                            
                                        $run_query = mysqli_query($con, $query);
                                    
                                        foreach($run_query as $class){
                                            echo '<li data-filter=".'.preg_replace('/\s+/', '', $class['brand_name']).'">'.$class['brand_name'].'</li>';
                                        }
                                    } else {
                                        echo '<li class="active" data-filter="*">Not available</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="clothing-item">
                            <div class="row">
                                <?php
                                    $query = "SELECT * FROM products WHERE product_serviceCategory='$get_id'";
                                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                                    $num_rows = mysqli_num_rows($run_query);
                                    
                                    if($num_rows != 0){
                                        foreach($run_query as $product){
                                            if($product['product_price']==NULL){
                                                $price = 'TBA';
                                            } else {
                                                $price = $product['product_price'];
                                            }
                                            echo '
                                                <div class="col-sm-6 col-md-6 col-lg-6 wow fadeIn item '.preg_replace('/\s+/', '', $product['product_brand']).'" data-wow-delay="0.1s">
                                                    <div class="row">
                                                        <div class="col-md-5 col-xs-5">
                                                            <img class="img-responsive" src="assets/img/products/'.$product['product_image'].'" style="width: 100%;" alt="image unavailable" />
                                                        </div>
                                                        <div class="col-md-7 col-xs-5" style="padding-bottom: 15%; padding-right: 5%;">
                                                            <div class="clothing-label">
                                                              <p class="text-muted">'.$product['product_brand'].'</p>
                                                              <h5>'.$product['product_name'].'</h5>
                                                              <p>Model #'.$product['product_model'].'</p>
                                                              
                                                              <p id="bottom" class="text-muted">
                                                                Price : '.$price.'</div>
                                                              </p>
                                                            </div>
                                                    </div>      
                                                
                                                </div>
                                            ';
                                        } 
                                    } else {
                                        echo '<h3 class="text-center text-muted">No product available for this Service at the moment, <br>will be updated in the future.</h3>';
                                    }

                                    

                                ?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
      </div>
<?php include("footer.php"); ?>