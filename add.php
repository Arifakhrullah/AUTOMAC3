<?php require("header.php"); ?>
<div class="container">
    <?php
        $function = $_GET['admin'];
    
        if($function == 'addProduct'){
    ?>
    <!-- For Product -->
            <h1 id="header__gold">ADD PRODUCT</h1>
            <hr>
            <form class="form-horizontal text__gold" method="POST" enctype="multipart/form-data">
                <?php 
                    if(isset($_POST['add'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $category = $_POST['category'];
                        $price = $_POST['price'];
                        $desc = $_POST['desc'];
                        $file = $_FILES['file']['name'];
                        $sizeArray = $_POST['size'];
                        $size = implode(".", $sizeArray);

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
                                    if(file_exists("assets/img/products/".$file)){
                                        echo "<div class='alert alert-danger'>
                                                <strong>".$_FILES["file"]["name"]." already exist. Please choose different image or filename.</strong>
                                            </div>";
                                    } else {
                                        $query = "INSERT INTO products VALUES (NULL, '".$category."', '".$name."', '".$price."', '".$file."', '".$desc."', '".$size."')";

                                        if(mysqli_query($con, $query)){
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Successfully added new product!');
                                                window.location.href='admin.php?admin=1';
                                                </script>");
                                            move_uploaded_file($_FILES["file"]["tmp_name"],"assets/img/products/".$file);

        //                                    echo $query;
                                        } else {
                                            echo("<script LANGUAGE='JavaScript'>
                                                window.alert('Failed to add new product!');
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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of product">
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
                                echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="price">Price in $</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price of product">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="size">Size Available</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline"><input name="size[]" type="checkbox" value="XS">XS</label>
                        <label class="checkbox-inline"><input name="size[]" type="checkbox" value="S">S</label>
                        <label class="checkbox-inline"><input name="size[]" type="checkbox" value="M">M</label>
                        <label class="checkbox-inline"><input name="size[]" type="checkbox" value="L">L</label> 
                        <label class="checkbox-inline"><input name="size[]" type="checkbox" value="XL">XL</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="desc">Description of Product</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="comment" name="desc" placeholder="Description of product"></textarea>
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
        } else if ($function == 'addCategory'){
    ?>
    <!-- For Category -->
            <h1 id="header__gold">ADD CATEGORY</h1>
            <hr>
            <form class="form-horizontal text__gold" method="POST" enctype="multipart/form-data">
                <?php 
                    if(isset($_POST['add'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];

                        $query = "INSERT INTO categories VALUES (NULL, '".$name."', NULL)";
                        
                        if(mysqli_query($con, $query)){
                            echo("<script LANGUAGE='JavaScript'>
                                window.alert('Successfully created new Category!');
                                window.location.href='admin.php?admin=1';
                                </script>");

                        } else {
                            echo("<script LANGUAGE='JavaScript'>
                                window.alert('Failed to create new Category!');
                                window.location.href='admin.php?admin=1';
                                </script>");
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
                    <div class="col-sm-offset-2 col-sm-2">
                        <input type="submit" class="btn btn-default" name="add" value="Add this Category">
                    </div>
                </div>
            </form>  
    <?php
        }
    ?>
     
</div>


<?php require("footer.php"); ?>