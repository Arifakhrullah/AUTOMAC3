<?php require("header.php"); ?>

    <?php
        $function = $_GET['admin'];

        if($function == 'editProduct'){
    ?>
            <div class="container wow fadeInUp" style="padding-top: 30px;">
                <?php
                    $id = $_GET['id'];

                    $query = "SELECT * FROM products WHERE product_id=$id";

                    $run_query = mysqli_query($con, $query);

                    foreach($run_query as $product){

                ?>
                <h1 id="header__gold">EDIT <?php echo strtoupper($product['product_name']); ?> <span style="font-size: 13px;" class="text-muted">ID #<?php echo $id; ?></span></h1>
                <hr>
<!--                <div class="form">-->
                <?php
                    if(isset($_POST['update'])){
//                        $file = $_FILES['file']['name'];
                        $allowed_ext = array("jpg","png","jpg","gif");
                        $explode_ext = explode(".", $_FILES["file"]["name"]);
                        $ext = end($explode_ext);

                        if(($_FILES["file"]["type"] == "image/gif") 
                            || ($_FILES["file"]["type"] == "image/jpeg") 
                            || ($_FILES["file"]["type"] == "image/png") 
                            || ($_FILES["file"]["type"] == "image/gif")
                            && ($_FILES["file"]["size"] < 20000)
                            && in_array($ext, $allowed_ext)) {
                                if($_FILES["file"]["error"] > 0){
                                    echo "Return code: ".$_FILES["file"]["error"]."<br/>";
                                } else {
                                    if(file_exists("assets/img/products/".$_FILES['file']['name'])){
                                        echo "<div class='alert alert-danger'>
                                                <strong>".$_FILES["file"]["name"]." already exist. Please choose different image or filename.</strong>
                                            </div>";
                                    } else {
                                        if($_FILES['file']['name']){
                                          //$file = NEW IMAGE
                                            $file = $_FILES['file']['name'];
                                        } else {
                                          //$file = OLD IMAGE
                                            $file = $product['product_image'];
                                        }
                                        

                                        //This deletes the previous image
                                        $path = "assets/img/products/".$product['product_image'];
                                        unlink($path);

                                        $query = "UPDATE products SET product_name='".$_POST['name']."', product_model='".$_POST['model']."', product_brand='".$_POST['brand']."', product_serviceCategory='".$_POST['service']."', product_image='".$file."' WHERE product_id=$id";

                                        if(mysqli_query($con, $query)){
                                            echo '<div class="alert alert-success">
                                                <p>Changes has been made. Redirecting back to previous page.</p>
                                            </div>';
                                            move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/products/".$file);
                                            header("Refresh: 1, url=admin.php?admin=1");
                                            
                                        } else {
                                            echo '<div class="alert alert-danger">
                                                <p>Edit Failed! Please try again.</p>
                                            </div>';
                                        }
                                    }
                                }
                        } else {

                            $query = "UPDATE products SET product_name='".$_POST['name']."', product_model='".$_POST['model']."', product_brand='".$_POST['brand']."', product_serviceCategory='".$_POST['service']."' WHERE product_id=$id";

                            if(mysqli_query($con, $query)){
                                echo '<div class="alert alert-success">
                                    <p>Changes has been made. Redirecting back to previous page.</p>
                                </div>';
                                header("Refresh: 1, url=admin.php?admin=1");

                            } else {
                                echo '<div class="alert alert-danger">
                                    <p>Edit Failed! Please try again.</p>
                                </div>';
                            }   
                        }
        
                                
                    }  
                ?>
                <form class="form-horizontal text__gold" method="POST" enctype="multipart/form-data">    
                    <div class="form-group">
                        <label class="col-sm-2" for="name">Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['product_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="price">Product Brand</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $product['product_brand']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="price">Product Model</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="model" name="model" value="<?php echo $product['product_model']; ?>">
                        </div>
                    </div>
                    <div class="form-group has-error">
                    <label class="col-sm-2" for="name">Service<span style="color: #c92929;">*</span></label>
                    <div class="col-sm-6">
                    <select class="form-control" name="service" id="service">
                        <?php 
                            $query = "SELECT * FROM services";
                            $run_query = mysqli_query($con, $query);
                        
                            foreach($run_query as $service){
                        ?>
                            <option value="<?php echo $service['service_nameShort'];?>"><?php echo $service['service_name'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <p style="color: #c92929;">*Select <b><u><?php echo $service['service_name'];?></u></b> again if unchanged.</p>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="file">Current Image</label>
                        <div class="col-sm-6">
                            <img src="assets/img/products/<?php echo $product['product_image']?>" class="img-responsive" style="width: 30rem;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="file">Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                          <button type="submit" class="btn btn-default" name="update">Submit</button>
                        </div>
                    </div>
                </form>       
                <?php
                    }
                ?>
                            
            </div>
<?php
    } else if($function == 'editService'){
?>
                <div class="container wow fadeInUp" style="padding-top: 30px;">
                    <?php
                        $id = $_GET['id'];

                        $query = "SELECT * FROM services WHERE service_id=$id";

                        $run_query = mysqli_query($con, $query);

                        foreach($run_query as $service){

                    ?>
                    <h1 id="header__gold">EDIT <?php echo strtoupper($service['service_name']); ?> <span style="font-size: 13px;" class="text-muted">ID #<?php echo $id; ?></span></h1>
                    <hr>
                    <?php
                        if(isset($_POST['update'])){
    //                        $file = $_FILES['file']['name'];
                            $allowed_ext = array("jpg","png","jpg","gif");
                            $explode_ext = explode(".", $_FILES["file"]["name"]);
                            $ext = end($explode_ext);

                            if(($_FILES["file"]["type"] == "image/gif") 
                                || ($_FILES["file"]["type"] == "image/jpeg") 
                                || ($_FILES["file"]["type"] == "image/png") 
                                || ($_FILES["file"]["type"] == "image/gif")
                                && ($_FILES["file"]["size"] < 20000)
                                && in_array($ext, $allowed_ext)) {
                                    if($_FILES["file"]["error"] > 0){
                                        echo "Return code: ".$_FILES["file"]["error"]."<br/>";
                                    } else {
                                        if(file_exists("assets/img/services/".$_FILES['file']['name'])){
                                            echo "<div class='alert alert-danger'>
                                                    <strong>".$_FILES["file"]["name"]." already exist. Please choose different image or filename.</strong>
                                                </div>";
                                        } else {
                                            if($_FILES['file']['name']){
                                              //$file = NEW IMAGE
                                                $file = $_FILES['file']['name'];
                                            } else {
                                              //$file = OLD IMAGE
                                                $file = $service['service_img'];
                                            }


                                            //This deletes the previous image
                                            $path = "assets/img/services/".$service['service_img'];
                                            unlink($path);

                                            $query = "UPDATE services SET service_name='".$_POST['name']."', service_nameShort='".$_POST['nameShort']."', service_subInfo='".$_POST['subInfo']."', service_img='".$file."' WHERE service_id=$id";

                                            if(mysqli_query($con, $query)){
                                                echo '<div class="alert alert-success">
                                                    <p>Changes has been made. Redirecting back to previous page.</p>
                                                </div>';
                                                move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/services/".$file);
                                                header("Refresh: 1, url=admin_services.php?admin=1");

                                            } else {
                                                echo '<div class="alert alert-danger">
                                                    <p>Edit Failed! Please try again.</p>
                                                </div>';
                                            }
                                        }
                                    }
                            } else {

                                $query = "UPDATE services SET service_name='".$_POST['name']."', service_nameShort='".$_POST['nameShort']."', service_subInfo='".$_POST['subInfo']."' WHERE service_id=$id";
                                
                                if(mysqli_query($con, $query)){
                                    echo '<div class="alert alert-success">
                                        <p>Changes has been made. Redirecting back to previous page.</p>
                                    </div>';
                                    header("Refresh: 1, url=admin_services.php?admin=1");

                                } else {
                                    echo '<div class="alert alert-danger">
                                        <p>Edit Failed! Please try again.</p>
                                    </div>';
                                }   
                            }


                        }  
                    ?>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2" for="name">Service Name</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo $service['service_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="name">Short Name (abbrv)</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="nameShort" name="nameShort" value="<?php echo $service['service_nameShort']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="name">Sub Info (if any)</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="subInfo" name="subInfo" value="<?php echo $service['service_subInfo']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="file">Current Image</label>
                            <div class="col-sm-6">
                                <img src="assets/img/services/<?php echo $service['service_img']?>" class="img-responsive" style="width: 30rem;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="file">Service Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" id="file">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-2">
                              <button type="submit" class="btn btn-default" name="update">Submit</button>
                            </div>
                        </div>
                    </form> 
                    <?php
                        }
                    ?>
                </div>
        
<?php
    }
?>

<?php require("footer.php"); ?>