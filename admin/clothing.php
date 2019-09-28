<div class="col-md-8" style="background: #ffe23b;">
    <h1>All Products <a href="add.php?admin=addProduct" class="btn btn-large btn-default"><span class="glyphicon glyphicon-plus"></span></a></h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>ID #</th>
                <th>Price</th>
                <th>Image</th>
                <th>Sizes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM products";
                $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                foreach($run_query as $clothing){

                if(!$clothing['product_size']){
                    $clothing['product_size'] = "<p class='text-muted'>--</p>";
                }

                echo '
                    <tr class="clothing-table">
                            <td>'.$clothing['product_name'].'</td>
                            <td>'.$clothing['product_id'].'</td>
                            <td>'.$clothing['product_price'].'</td>
                            <td><img src="assets/img/products/'.$clothing['product_img'].'" class="img-responsive cloth-img"></td>
                            <td>'.$clothing['product_size'].'</td>
                            <td>
                                <a href="edit.php?admin=editProduct&id='.$clothing['product_id'].'" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a data-target="#deleteProduct'.$clothing['product_id'].'" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                    </tr>
                    <!-- Modal for delete -->
                    <div class="modal fade" id="deleteProduct'.$clothing['product_id'].'" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4>Delete '.$clothing['product_name'].'?</h4>

                                  <hr class="black-line">
                                  <p class="text-center">Preview</p>
                                  <img src="assets/img/products/'.$clothing['product_img'].'" class="img-responsive" style="width: 40rem; margin: auto;">
                                </div>
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
                                <a href="delete.php?Productid='.$clothing['product_id'].'" class="btn btn-danger">Yes</a>
                            </div>
                        </div>
                    </div>
                    ';


                }
            ?>
        </tbody>
    </table>
</div>

<div class="col-md-4 col-xs-12 col-sm-12" style="background: #ffe23b;">
    <h1>Categories <a href="add.php?admin=addCategory" class="btn btn-large btn-default"><span class="glyphicon glyphicon-plus"></span></a></h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM categories";
                $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                foreach($run_query as $category){

                echo '
                    <tr class="clothing-table">
                            <td>'.$category['category_name'].'</td>
                            <td>
                                <a href="edit.php?admin=editCategory&id='.$category['category_id'].'" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a data-target="#deleteCategory'.$category['category_id'].'" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                    </tr>
                    <!-- Modal for delete -->
                    <div class="modal fade" id="deleteCategory'.$category['category_id'].'" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4>Delete '.$category['category_name'].'?</h4>

                                  <hr class="black-line">
                                </div>
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
                                <a href="delete.php?Categoryid='.$category['category_id'].'" class="btn btn-danger">Yes</a>
                            </div>
                        </div>
                    </div>
                    ';


                }
            ?>
        </tbody>
    </table>
</div>

