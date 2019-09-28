<?php require("header.php"); ?>

    <?php
        $function = $_GET['admin'];

        if($function == 'editProduct'){
    ?>
            <div class="container">
                <?php
                    $id = $_GET['id'];

                    $query = "SELECT * FROM products WHERE product_id=$id";

                    $run_query = mysqli_query($con, $query);

                    foreach($run_query as $clothing){

                ?>
                <h1 id="header__gold">EDIT <?php echo strtoupper($clothing['product_name']); ?></h1>
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
                                            $file = $clothing['product_img'];
                                        }
                                        
                                        $sizeArray = $_POST['size'];
                                        $size = implode(".", $sizeArray);

                                        //This deletes the previous image
                                        $path = "assets/img/products/".$clothing['product_img'];
                                        unlink($path);

                                        $query = "UPDATE products SET product_name='".$_POST['name']."', product_price='".$_POST['price']."', product_desc='".$_POST['desc']."', product_img='".$file."', product_size='".$size."' WHERE product_id=$id";

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

                            $sizeArray = $_POST['size'];
                            $size = implode(".", $sizeArray);

                            $query = "UPDATE products SET product_name='".$_POST['name']."', product_price='".$_POST['price']."', product_desc='".$_POST['desc']."', product_img='".$clothing['product_img']."', product_size='".$size."' WHERE product_id=$id";

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
                        <label class="col-sm-2" for="email">Product ID # </label>
                        <div class="col-sm-2">
                          <span class="badge" style="color: black; background-color:#c6a903;"><?php echo $clothing['product_id']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="name">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $clothing['product_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="price">Price in $</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="price" name="price" value="<?php echo $clothing['product_price']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2" for="name">Category</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="category" id="category">
                        <?php 
                            $query = "SELECT * FROM categories";
                            $run_query = mysqli_query($con, $query);

                            foreach($run_query as $category){
                        ?>
                                <option value="<?php echo $category['category_id'];?>" ><?php echo $category['category_name'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                    </div>
                </div>
                    <?php
                        $sizeArr = explode(".", $clothing['product_size']);
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2" for="size">Size Available</label>
                        
                        <div class="col-sm-10">
                            <label class="checkbox-inline"><input name="size[]" type="checkbox" value="XS" <?php if(in_array("XS", $sizeArr)){ echo "checked"; } ?>>XS</label>
                            <label class="checkbox-inline"><input name="size[]" type="checkbox" value="S" <?php if(in_array("S", $sizeArr)){ echo "checked"; } ?>>S</label>
                            <label class="checkbox-inline"><input name="size[]" type="checkbox" value="M" <?php if(in_array("M", $sizeArr)){ echo "checked"; } ?>>M</label>
                            <label class="checkbox-inline"><input name="size[]" type="checkbox" value="L" <?php if(in_array("L", $sizeArr)){ echo "checked"; } ?>>L</label> 
                            <label class="checkbox-inline"><input name="size[]" type="checkbox" value="XL" <?php if(in_array("XL", $sizeArr)){ echo "checked"; } ?>>XL</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="desc">Description of Product</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="5" id="comment" name="desc"><?php echo $clothing['product_desc']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="file">Current Image</label>
                        <div class="col-sm-10">
                            <img src="assets/img/products/<?php echo $clothing['product_img']?>" class="img-responsive" style="width: 30rem;">
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
    } else if($function == 'editCategory'){
?>
                <div class="container">
                    <?php
                        $id = $_GET['id'];

                        $query = "SELECT * FROM categories WHERE category_id=$id";

                        $run_query = mysqli_query($con, $query);

                        foreach($run_query as $category){

                    ?>
                    <h1 id="header__gold">EDIT <?php echo strtoupper($category['category_name']); ?></h1>
                    <hr>
                    <?php
                        if(isset($_POST['update'])){
                            $query = "UPDATE categories SET category_name='".$_POST['name']."' WHERE category_id=$id";

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
                    ?>
                    <form class="form-horizontal text__gold" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2" for="email">Product ID # </label>
                            <div class="col-sm-2">
                              <span class="badge" style="color: black; background-color:#c6a903;"><?php echo $category['category_id']; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="name">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['category_name']; ?>">
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