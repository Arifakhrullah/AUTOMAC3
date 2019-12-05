<?php include("header.php"); ?>   
  <div id="myCarousel" class="carousel slide wow fadeInDown" data-wow-delay="0.1s" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item">
        <img src="assets/banner/Senstar.png" alt="Senstar" style="width:100%;">
      </div>
      <div class="item active">
        <img src="assets/banner/Anviz.png" alt="Anviz" style="width:100%;">
      </div>
      <div class="item">
        <img src="assets/banner/Mikrotik.png" alt="Mikrotik" style="width:100%;">
      </div>
      <div class="item">
        <img src="assets/banner/Comnet.png" alt="Mikrotik" style="width:100%;">
      </div>
      <div class="item">
        <img src="assets/banner/xray.png" alt="Xray" style="width:100%;">
      </div>
      <div class="item">
        <img src="assets/banner/indigo.png" alt="IndigoVision" style="width:100%;">
      </div>
      <div class="item">
        <img src="assets/banner/rapidcctv.png" alt="CCTV" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    <hr>
    <div class="container wow fadeInUp" style="padding-left: 8%; padding-right: 8%;">
        <div class="row">
            <div class="col-md-9">
              <!-- <div class="alert alert-info" style="border-radius: 0; color: #000;">
                <button type="button" class="close" data-dismiss="alert"><b>&times;</b></button>
                  <p><b>Message from Automac Multiresources:</b><br>
                  Please contact xxxxxxxx for any queries regarding our services. Thank you for understanding.</p>
              </div> -->
              <!--This auto closes the alert-->
              <!-- <script>
                  window.setTimeout(function() {
                      $(".alert").fadeTo(66000, 26000).slideUp(1600, function(){
                          $(this).remove(); 
                      });
                  }, 4000);
              </script> -->
                <div class="col-md-12 purpose">
                    <h2 id="header__black" style="line-height: 24px;"><span style="color: #657ab3; font-size: 20px;">Automac Multiresources</span><br>OUR PURPOSE &amp; COMMITMENT</h2>
                    <p>Our mission is to provide quality products and services through exceptional customer service standards and to be recognized for our strong commitment to serve our customers with integrity, ethical standards, and continuous improvement.
                    <br><br>
                    We believe in the principle by which we are guided that doing what is ethically correct for employees, employers, and clients, is the only way to create a positive and a win / win situation in the long term.
                    </p>
                </div>
                <br>
                <hr>
                <div class="col-md-12">
                    <h2 id="header__black">OUR SERVICES</h2>
                    <div class="visible-xs">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title text-center">
                                <a data-toggle="collapse" href="#collapse1">Services We Offer</a>
                              </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                              <div class="panel-body">
                                <ul class="list-group">
                                <h4>Services</h4>
                                    <?php
                                    $query = "SELECT * FROM services ORDER BY service_id";
                                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                                    $num_rows = mysqli_num_rows($run_query);

                                    foreach($run_query as $service){
                                        echo '<li class="list-group-item"><a href="product_brands.php?id='.$service['service_nameShort'].'">'.$service['service_name'].'</a></li>';
                                    }
                                ?>
                                </ul>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Provision of Specialist Resources</h4>
                                <p class="card-text text-muted">Services to both the oil and gas and non-oil and gas industries (such as telecommunications, civil construction and government missions/embassies).</p>
                                <a href="services.php#service1" class="card-link">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">System Integration and Consultancy</h4>
                                <p class="card-text text-muted">The Integration and Consultancy for information and communication technology (ICT) systems specifically in Electronic Security Systems (ESS) to government and the private sector.</p>
                                <a href="services.php#service2" class="card-link">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Professional Resource Secondment</h4>
                                <p class="card-text text-muted">Secondment of technical, professional and clerical personnel.</p>
                                <a href="services.php#service1" class="card-link">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 visible-lg visible-md">
                <ul class="list-group service-home">
                <li class="list-group-item" style="background-color: #657ab3; font-size: 17px; color: #fff; width: 48%;">Services</li>
                    <?php
                    // $query = "SELECT * FROM services ORDER BY service_name";
                    $query = "SELECT *, CASE WHEN service_name LIKE 'Manpower%' THEN 0 ELSE 1 END AS Ordering
                              FROM services 
                              ORDER BY Ordering, service_name";
                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                    $num_rows = mysqli_num_rows($run_query);

                    foreach($run_query as $service){
                        echo '<li class="list-group-item"><a href="product_brands.php?id='.$service['service_nameShort'].'">'.$service['service_name'].'</a></li>';
                    }
                ?>
                </ul>
            </div>
        </div>
      </div>
<?php include("footer.php"); ?>