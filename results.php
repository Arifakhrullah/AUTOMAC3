<?php include("header.php"); ?>
<div class="container text__black wow fadeInUp" style="padding-top: 20px;">
    <?php
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            
//            $query = "SELECT p.* FROM categories AS c INNER JOIN products AS p ON c.category_id = p.product_category WHERE p.product_name LIKE '%$search%' OR c.category_name = '%$search%' ORDER BY p.product_id";
            
            
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
            
            foreach($run_query as $product){
                echo '
                <a href="product.php?id='.$product['product_id'].'" class="text__black">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6  wow fadeInUp item '.$product['product_serviceCategory'].'">
                    <img class="img-responsive" src="assets/img/services/CCTV.png" style="width: 100%;" alt="image unavailable" />
                       <div class="clothing-label">
                          <p class="text-muted">'.$product['product_brand'].'</p>
                          <h5>'.$product['product_name'].'</h5>
                          <p>Model #'.$product['product_model'].'</p>
                        </div>
                    </div>
                </a>
                    ';
            }
        }
        
    
        
    ?>
</div>
<?php include("footer.php"); ?>