<?php include("header.php"); ?>
        <div class="upper">
            <div class="container wow fadeIn" data-wow-delay="0.1s">
                <?php
                    $get_id = $_GET['id'];
                    if($get_id == 'CCTV')
                        $service = "Video Surveillance System";
                    if($get_id == 'ACS')
                        $service = "Access Control System";
                    if($get_id == 'AS')
                        $service = "Alarm System";
                    if($get_id == 'PIDS')
                        $service = "Perimeter Intrusion Detection System";
                    if($get_id == 'AWS')
                        $service = "Audio Warning System";
                    if($get_id == 'IDI')
                        $service = "Intruder Deterrent Installations";
                    if($get_id == 'Monitors')
                        $service = "Commercial and Industrial Display Monitors";
                    if($get_id == 'RFID')
                        $service = "RFID Door Locks and Enterprise Wifi Solution";
                    if($get_id == 'ACF')
                        $service = "Anti-climb Fences";
                    if($get_id == 'UVSS')
                        $service = "Under Vehicle Surveillance System";
                    if($get_id == 'GVXM')
                        $service = "Gantry Vehicle X-ray Machine";
                    if($get_id == 'Xray')
                        $service = "X-ray Machine Repair Works";
                    if($get_id == 'Communication')
                        $service = "Commercial and Industrial audio, video, data and Ethernet Communications Products";
                
                    echo '<h1 id="header__gold">'.$service.'</h1>';
                ?>
                
                <div class="row text__gold">
                    <div class="col-md-12" style="margin-left: 2.5rem; margin-right: 2.5rem; padding-left: 0;">
                        <div class="clothing-menu">
                            <ul>
                                <li class="active" data-filter="*">All Product</li>
                                <?php
                                    $query = "SELECT * FROM categories";
                                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                                    foreach($run_query as $class){
                                        echo '<li data-filter=".'.$class['category_id'].'">'.$class['category_name'].'</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="clothing-item">
                            <div class="row">
                                <?php
                                    $query = "SELECT * FROM products ORDER BY product_name DESC";
                                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                                    $num_rows = mysqli_num_rows($run_query);

                                    foreach($run_query as $product){
                                        echo '
                                        <a href="product.php?id='.$product['product_id'].'" class="shop-div text__gold">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 wow fadeIn item '.$product['product_category'].'" data-wow-delay="0.2s">
                                            ';

                                            $product_id = $product['product_id'];
                                            $query = "SELECT * FROM products WHERE product_id = '$product_id'";
                                            $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                                            foreach($run_query as $product){
                                                if($product['product_id'] >= ($num_rows - 4)){
                                                    echo '<span class="product-new-label">New</span>';
                                                }

                                            }
                                        echo '
                                                  <img class="img-responsive" src="assets/img/products/'.$product['product_img'].'" style="width: 100%;" alt="image unavailable" />
                                                  <div class="clothing-label">
                                                      <h5>'.$product['product_name'].'</h5>
                                                      <p>BND '.$product['product_price'].'</p>
                                                  </div>
                                            </div>
                                        </a>';
                                    }

                                ?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
      </div>
<?php include("footer.php"); ?>