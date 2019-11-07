<?php require("header.php"); ?>
<div class="container wow fadeInUp" style="padding-top: 30px;">
    <?php
        $function = $_GET['admin'];
    
        if($function == 'addProduct'){
    ?>
    <!-- For Product -->
            <form>
              <input type="button" class="btn btn-default" value="Go back to Previous page" onclick="history.back()">
            </form>
            <h1>ADD NEW PRODUCT</h1>
            <hr>
            <form class="form-horizontal text__gold" method="POST" enctype="multipart/form-data">
                <?php 
                    if(isset($_POST['add'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $service = $_POST['service'];
                        $brand = $_POST['brand'];
                        $model = $_POST['model'];
                        $file = $_FILES['file']['name'];

                        $allowed_ext = array("jpg","png","jpg","gif");
                        $explode_ext = explode(".", $_FILES["file"]["name"]);
                        $ext = end($explode_ext);

                        if(($_FILES["file"]["type"] == "image/gif") 
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/png") 
                            || ($_FILES["file"]["type"] == "image/gif")
                            && ($_FILES["file"]["size"] < 20000)
                            && in_array($ext, $allowed_ext)) {
                                if($_FILES["file"]["error"] > 0){
                                    echo "Return code: ".$_FILES["file"]["error"]."<br/>";
                                } else {
                                    if(file_exists("assets/img/services/".$file)){
                                        echo "<div class='alert alert-danger'>
                                                <strong>".$_FILES["file"]["name"]." already exist. Please choose different image or filename.</strong>
                                            </div>";
                                    } else {
                                        if($price==''){
                                            $query = "INSERT INTO products VALUES (NULL, '".$name."', NULL, '".$model."', '".ucwords($brand)."', '".$service."', '".$file."')";
                                        } else {
                                            $query = "INSERT INTO products VALUES (NULL, '".$name."', '$".$price."', '".$model."', '".ucwords($brand)."', '".$service."', '".$file."')";
                                        }
                                        

                                        if(mysqli_query($con, $query)){
                                            $query = "SELECT * FROM brands WHERE (brand_name='.$brand.' && brand_service='.$service.')";
            
                                            $run_query = mysqli_query($con, $query);

                                            if ($run_query=mysqli_query($con,$query)){

                                                $rowcount=mysqli_num_rows($run_query);
                                                
                                                if($rowcount == 0){
                                                    $query = "INSERT INTO brands VALUES (NULL, '".ucwords($brand)."', '".$service."')";
                                                    mysqli_query($con, $query);
                                                } 
                                            }
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Successfully added new Product!');
                                                window.location.href='admin.php?admin=1';
                                                </script>");
                                            move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/products/".$file);
                                            
                                            
                                            

        //                                    echo $query;
                                        } else {
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Failed to add new product!');
                                                window.location.href='admin.php?admin=1';
                                                </script>");
//                                            echo $query;
                                        }
                            }
                          }
                        }
                    } 
                ?>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of product">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="price">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price of product">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="name">Service Category</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="service" id="service">
                        <?php 
                            $query = "SELECT * FROM services";
                            $run_query = mysqli_query($con, $query);

                            foreach($run_query as $service){
                                echo '<option value="'.$service['service_nameShort'].'">'.$service['service_name'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="model">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand of product">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="model">Product Model</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Model of product">
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
                        <input type="submit" class="btn btn-default" name="add" value="Add this Product">
                    </div>
                </div>
            </form>
    <?php
        } else if ($function == 'addService'){
    ?>
    <!-- For Category -->
            <input type="button" class="btn btn-default" value="Go back to Previous page" onclick="history.back()">
            <h1 id="header__gold">ADD NEW SERVICE</h1>
            <hr>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <?php 
                    if(isset($_POST['add'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $nameShort = $_POST['nameShort'];
                        $file = $_FILES['file']['name'];

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
                                    if(file_exists("assets/img/services/".$file)){
                                        echo "<div class='alert alert-danger'>
                                                <strong>".$_FILES["file"]["name"]." already exist. Please choose different image or filename.</strong>
                                            </div>";
                                    } else {
                                        $query = "INSERT INTO services VALUES (NULL, '".$name."', '".$nameShort."', '".$subInfo."', '".$file."')";

                                        if(mysqli_query($con, $query)){
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Successfully added new Service!');
                                                window.location.href='admin.php?admin=1';
                                                </script>");
                                            move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/services/".$file);

        //                                    echo $query;
                                        } else {
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Failed to add new Service!');
                                                window.location.href='admin.php?admin=1';
                                                </script>");
        //                                    echo $query;
                                        }
                            }
                          }
                        }
                    } 
                ?>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of Service">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="name">Short Name (abbrv)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nameShort" name="nameShort" placeholder="Short name of the Service">
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-2" for="name">Sub Info (if any)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="info" name="info" placeholder="Sub Information">
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
                        <input type="submit" class="btn btn-default" name="add" value="Add this Service">
                    </div>
                </div>
            </form>  
    <?php
        }
    ?>
     
</div>


<?php require("footer.php"); ?>