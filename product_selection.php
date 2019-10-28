<?php include("header.php"); ?> 
    <div class="container wow fadeInUp" style="padding-left: 10%; padding-right: 10%; padding-top: 40px;">
        <div class="row">
            <div class="col-md-12" id="product_selection">
                <h1 id="header__black">Products &amp; Services We Offer</h1>
                <p style="text-align: justify; line-height: 3rem;"><b>AMSB</b> provides products and services in Electronic Security Systems (ESS) including but not limited to security consultancy, design, supply, installation and maintenance for:
                </p>
                <div class="container-fluid">
                    <?php
                        $query = "SELECT * FROM services ORDER BY service_id";
                        $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                        $num_rows = mysqli_num_rows($run_query);
                    
                        foreach($run_query as $service){
                            echo '<a href="product_brands.php?id='.$service['service_nameShort'].'">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 wow fadeInUp services" style="height: 290px; padding: 10px;">
                                    <img class="img-responsive" src="assets/img/services/'.$service['service_img'].'" style="width: 100%; padding-bottom: 10px;" alt="image unavailable" />
                                       <div class="service-label">
                                          <p>'.$service['service_name'].'</p>
                                        </div>
                                    </div>
                                  </a>';
                        }
                    
                    ?>
                </div>
                <hr>
                <div class="row">
                    <p style="text-align: justify; line-height: 3rem;">We have provided security solutions to several government facilities in Negara Brunei Darussalam, and an accredited vendor of the Internal Security Department of the Brunei Government.   
                    <br>
                    <b>AMSB</b> is supporting all the IT requirements and services required by most of the members of the Adinin Group of Companies and offers the services to third-party Clients. Services include setting-up Active Directory setup and administration, systems development, network design, installation (organized LAN structure),maintenance and troubleshooting, and  other desktop support services. We are accredited (ICTAB Class 2) by the Authority for Info-communications, Technology Industry of Brunei Darussalam (AITI).
                    </p>
                </div>
            </div>
        </div>
      </div>
<?php include("footer.php"); ?>