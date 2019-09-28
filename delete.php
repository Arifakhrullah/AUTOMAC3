<?php
require_once('database/dbconfig.php');
    
if (strpos($_SERVER['REQUEST_URI'], "delete.php?Categoryid=") !== false){
    $id = $_GET['Categoryid'];
    
    $query = "SELECT * FROM categories WHERE category_id = '$id'";
    $run_query = mysqli_query($con, $query);

    foreach($run_query as $product){  
        $id = $_GET['Categoryid'];

        $delete = "DELETE FROM categories WHERE category_id = '$id'";
        if(mysqli_query($con, $delete)){
            echo('<script LANGUAGE="JavaScript">
                    window.alert("Delete Successful!");
                    window.location.href="admin.php?admin=1";
                    </script>');
        } else{
            echo('<script LANGUAGE="JavaScript">
                    window.alert("Delete Failed!");
                    window.location.href="admin.php?admin=1;
                    </script>');
        }  
    }
}

if (strpos($_SERVER['REQUEST_URI'], "delete.php?Productid=") !== false){
    $id = $_GET['Productid'];
    
    $query = "SELECT * FROM products WHERE product_id = '$id'";
    $run_query = mysqli_query($con, $query);

    foreach($run_query as $product){
        if(unlink("assets/img/products/".$product['product_img'])){
            
            $id = $_GET['Categoryid'];
            
            $delete = "DELETE FROM products WHERE product_id = '$id'";
            if(mysqli_query($con, $delete)){
                echo('<script LANGUAGE="JavaScript">
                        window.alert("Delete Successful!");
                        window.location.href="admin.php?admin=1";
                        </script>');
            } else{
                echo('<script LANGUAGE="JavaScript">
                        window.alert("Delete Failed!");
                        window.location.href="admin.php?admin=1;
                        </script>');
            }  
        }
    }
}

?>