<?php include("header.php"); ?>
            <div class="container">
                <h1 id="header__gold">PICK YOUR POISON</h1>
                <div class="row">
                    <div class="main_portfolio_content">
                        <?php
                            $query = "SELECT * FROM categories";
                            $run_query = mysqli_query($con, $query) or die(mysqli_error($con));
                            
                            foreach($run_query as $category){
                                echo '
                                    <a href="index.php">
                                        <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                            <img src="assets/img/category_banners/'.$category['category_img'].'" alt="" />
                                            <div class="portfolio_images_overlay text-center">
                                                <h6>'.$category['category_name'].'</h6>
                                            </div>
                                        </div>
                                    </a>
                                    ';  
                            }  
                        ?>
                        
                    </div>
                </div>
            </div>
<?php include("footer.php"); ?>