<?php include("header.php"); ?> 
    <div class="container wow fadeInUp" style="padding-left: 10%; padding-right: 10%;">
        <div class="row">
            <div class="col-md-12" id="service1" style="line-height: 2.8rem; padding-top: 40px;">
                <h1 id="header__black">Provision of Resource Services and Personnel Secondment</h1>
                <p style="text-align: justify;">We have provided Brunei Shell Petroleum Co. Sdn. Bhd. some high-profile professionals such as Supply Chain Management Consultant, Petro physicists, Drilling Engineers/Consultants, Well Completion Engineers/Consultants, QA/QC Engineers, ME&amp;I Engineers, Instrument / Electrical / Oilfield Technicians, SAP-HR Consultants, Bruneian SAP Data Converters/Coders, SAP Application Developers, Bruneians Business Support Personnel, Quantity Surveyors, etc. We have a databank of Business Management Consultants, and in the technical field, Oil &amp; Gas Sub-Surface Specialists in Petrophysics, Geology, Petroleum Technology, Oil &amp; Gas Reservoir, etc., HSE, Drillers, Welding Inspectors, Painting Inspectors, QA/QC, NDT Inspectors, Abseiling Technicians, etc.
                    
                <br><br>
                    
                We are also currently supplying technical and professional personnel to Dowell Schlumberger (Eastern) Inc. in Brunei Darussalam, majority of which are Bruneians. Positions supplied are SONDE Technicians, Wireline Operators / Helpers, Logistics Personnel, Electronics / Mechanical Technicians, Computer Operators, HSE Administrator / Officers, as well as general positions for Office Administration. 
                
                <br><br>
                    
                In the telecommunications industry, we provide resource services to Huawei Technologies (B) Sdn Bhd for the following positions: Bruneian Supply Chain Representative, Bruneian HR and Admin Specialist, Datacom Engineers, Telecom CS/RAN Engineers, Telecom Software Engineers, and Telecom PS Engineers, Wireless Engineers, Product Engineer, Reporting Engineer, Project Manager, Service Solution Representative, Project Coordinators, Radio Frequency Engineer, and Document Controller. 
                
                <br><br>
                    
                For those client-selected expatriates intended to be employed in Brunei, we have the Brunei Labour / Immigration quota to sponsor their employment. Given the Job Specifications, all logistical support will be placed in motion.

                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12" id="service2">
                <h1 id="header__black">System Integration and Consultancy &#40;ICT and ESS&#41;</h1>
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
                            
//                            echo '<a href="product_brands.php?id='.$service['service_nameShort'].'">
//                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 wow fadeInUp">
//                                    <img class="img-responsive" src="assets/img/services/'.$service['service_img'].'" style="width: 100%;" alt="image unavailable" />
//                                       <div class="product-label">
//                                          <p class="text-muted">'.$service['service_name'].'</p>
//                                        </div>
//                                    </div>
//                                </a>';
                        }
                    
                    ?>
                </div>
                <hr>
                <div class="row">
                    <p style="text-align: justify; line-height: 3rem;">We have provided security solutions to several government facilities in Negara Brunei Darussalam, and an accredited vendor of the Internal Security Department of the Brunei Government.   
                    <br><br>
                    <b>AMSB</b> is supporting all the IT requirements and services required by most of the members of the <a href="http://www.adinin.com/home.php" target="_blank"><u>Adinin Group of Companies</u></a> and offers the services to third-party Clients. Services include setting-up Active Directory setup and administration, systems development, network design, installation (organized LAN structure),maintenance and troubleshooting, and  other desktop support services. We are accredited (ICTAB Class 2) by the Authority for Info-communications, Technology Industry of Brunei Darussalam (AITI).
                    </p>
                </div>
            </div>
        </div>
      </div>
<?php include("footer.php"); ?>