<?php
    //This prevents anyone from directly accessing header.php
    if(strpos($_SERVER['REQUEST_URI'], basename("addCategory.php")) !== false){
        echo("<script LANGUAGE='JavaScript'>
            window.alert('Direct access to this page are not permitted!');
            window.location.href='index.php';
            </script>");    
    }
?>
<div class="row justify-content-center">
        <div class="form">
            <h4 class="text-center">Add New Category to the Website</h4>
            <p class="text-center">Enter name of Category</p>
            <form method="POST">
                <div class="form-group">
                    <input type="text" placeholder="Name of New Category" name="catName" class="form-control" id="catName">
                </div>
                <hr>
                <button type="submit" name="addCat" class="btn btn-default btn-block">Add Category</button>

            </form>
            <?php
                if(isset($_POST['addCat'])){
                    $name = $_POST['catName'];

                    $query = "INSERT INTO categories VALUES(NULL, '".$name."', NULL)";

                    if(mysqli_query($con, $query)){
                            echo("<script LANGUAGE='JavaScript'>
                                window.alert('Successfully added new category!');
                                window.location.href='admin.php?admin=1';
                                </script>");
                        } else {
                            echo("<script LANGUAGE='JavaScript'>
                                window.alert('Failed to add new category!');
                                window.location.href='admin.php?admin=1';
                                </script>");
                        }
                } 
            ?>
        </div>
</div>
