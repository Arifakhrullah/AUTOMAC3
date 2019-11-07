<?php require("header.php");?>
<div class="container" style="padding-top: 30px;">
    <?php 
        if(!isset($_GET['admin']) || !isset($_SESSION['user_name'])){
            echo '<div class="row">
                    <div class="col-md-10 col-md-offset-1 text__gold">
                        <h1>Cannot access, Please log in.</h1>
                    </div>
                </div>';
        } else {
    ?>
    <div class="col-md-12" style="background: #d3d3d3;">
        <h1>All Services <a href="add.php?admin=addService" class="btn btn-large btn-default"><span class="glyphicon glyphicon-plus"></span></a></h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Short Name</th>
                    <th>Sub Information</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM services";
                    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                    foreach($run_query as $service){

                    echo '
                        <tr class="clothing-table">
                                <td>'.$service['service_id'].'</td>
                                <td>'.$service['service_name'].'</td>
                                <td>'.$service['service_nameShort'].'</td>
                                <td>'.$service['service_subInfo'].'</td>
                                <td><img src="assets/img/services/'.$service['service_img'].'" class="img-responsive cloth-img"></td>
                                <td>
                                    <a href="edit.php?admin=editService&id='.$service['service_id'].'" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a data-target="#deleteService'.$service['service_id'].'" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                        </tr>
                        <!-- Modal for delete -->
                        <div class="modal fade" id="deleteService'.$service['service_id'].'" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4>Delete '.$service['service_name'].'?</h4>

                                      <hr class="black-line">
                                      <p class="text-center">Preview</p>
                                      <img src="assets/img/services/'.$service['service_img'].'" class="img-responsive" style="width: 40rem; margin: auto;">
                                    </div>
                                    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
                                    <a href="delete.php?Serviceid='.$service['service_id'].'" class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        } 
    ?>
</div>
    
<?php require("footer.php");?>