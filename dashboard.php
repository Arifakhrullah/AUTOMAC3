<div style="background: #ebc800; padding: 10px 20px;">
    <h3>Dashboard</h3>
    <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
</div>
<div style="padding: 10px 20px;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID #</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM products";
                $run_query = mysqli_query($con, $query);

                $rowcount = mysqli_num_rows($run_query);

                echo '
                <tr>
                    <td>Product</td>
                    <td>'.$rowcount.'</td>
                </tr>';
            
            ?>
            <?php
                $query = "SELECT * FROM categories";
                $run_query = mysqli_query($con, $query);

                $rowcount = mysqli_num_rows($run_query);

                echo '
                <tr>
                    <td>Category</td>
                    <td>'.$rowcount.'</td>
                </tr>';
            
            ?>
        </tbody>
    </table>
</div>