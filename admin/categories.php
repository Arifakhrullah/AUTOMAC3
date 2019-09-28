<div style="background: #ebc800; padding: 10px 20px;">
    <h3>List of Categories</h3>
    <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
    <a href="add.php?admin=addCategory" class="btn btn-large btn-default">Add new Category</a>
</div>
<div style="padding: 10px 20px;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID #</th>
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
                            <td>'.$category['category_id'].'</td>
                            <td>'.$category['category_name'].'</td>
                            <td>
                                <a href="edit.php?admin=editCategory&id='.$category['category_id'].'" class="btn btn-info">Edit</a>
                                <a data-target="#deleteModal'.$category['category_id'].'" data-toggle="modal" class="btn btn-danger">Delete</a>
                            </td>
                    </tr>
                    <!-- Modal for delete -->
                    <div class="modal fade" id="deleteModal'.$category['category_id'].'" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4>Delete '.$category['category_name'].'?</h4>

                                  <hr class="black-line">
                                </div>
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
                                <a href="delete.php?id='.$category['category_id'].'" class="btn btn-danger">Yes</a>
                            </div>
                        </div>
                    </div>
                    ';


                }
            ?>

        </tbody>
    </table>
</div>