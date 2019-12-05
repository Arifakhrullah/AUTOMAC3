<?php include("header.php"); ?>
<div class="container text__black wow fadeInUp" style="padding-top: 20px;">
    
    <?php
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            
            $query = "SELECT * FROM products AS p INNER JOIN services AS s ON p.product_serviceCategory=s.service_nameShort WHERE p.product_name LIKE '%$search%' OR p.product_serviceCategory LIKE '%$search%' OR s.service_nameShort = '%$search%'";
            
            $run_query = mysqli_query($con, $query);
            
            if ($run_query=mysqli_query($con,$query)){
            
                $rowcount=mysqli_num_rows($run_query);

                if($rowcount != 0)
                    if($rowcount < 2)
                        echo '
                            <div class="col-md-12">
                                <h1 id="header__gold">'.$rowcount.' RESULT FOR : "'.$search.'"</h1>
                            </div>
                            ';
                     else 
                        echo '
                            <div class="col-md-12">
                                <h1 id="header__gold">'.$rowcount.' RESULTS FOR : "'.$search.'"</h1>
                            </div>
                            ';
                else 
                    echo '
                        <div class="col-md-12">
                            <h1 id="header__gold">'.$rowcount.' RESULT FOUND FOR : "'.$search.'"</h1>
                        </div>
                        ';

            }
            echo '<div class="clothing-item" style="padding-top: 7%;">
                            <div class="row">';
            foreach($run_query as $product){
                echo '
                    <div class="col-lg-6 wow fadeIn item '.$product['product_id'].'" data-wow-delay="0.2s">
                    
                        <div class="row">
                            <div class="col-md-5 col-xs-5">
                                <img class="img-responsive" src="assets/img/products/'.$product['product_img'].'" style="width: 100%;" alt="image unavailable" />
                            </div>
                            <div class="col-md-7 col-xs-7" style="padding-bottom: 15%; padding-right: 5%;">
                                <div class="clothing-label">
                                  <p class="text-muted">'.$product['product_brand'].'</p>
                                  <h5>'.$product['product_name'].'</h5>
                                  <p>Model #'.$product['product_model'].'</p>

                                  <h4 id="bottom" class="text-muted">
                                    Price : '.$product['product_price'].'</div>
                                  </h4>
                            </div>
                        </div>      
                    
                    </div>
                ';
            }
        
            echo '
            </div></div>';
        }
        
    
        
    ?>
</div>
<?php include("footer.php"); ?>