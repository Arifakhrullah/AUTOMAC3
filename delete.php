<?php
require_once('database/dbconfig.php');

if (strpos($_SERVER['REQUEST_URI'], "delete.php?Serviceid=") !== false){
    $id = $_GET['Serviceid'];
    
    $query = "SELECT * FROM services WHERE service_id = '$id'";
    $run_query = mysqli_query($con, $query);

    foreach($run_query as $service){
        $image = $service['service_img'];
        if(unlink("assets/img/services/$image")){
            
            $id = $_GET['Serviceid'];
            
            $delete = "DELETE FROM services WHERE service_id = '$id'";
            if(mysqli_query($con, $delete)){
                echo('<script LANGUAGE="JavaScript">
                        window.alert("Delete Successful!");
                        window.location.href="admin_services.php?admin=1";
                        </script>');
            } else{
                echo('<script LANGUAGE="JavaScript">
                        window.alert("Delete Failed!");
                        window.location.href="admin_services.php?admin=1;
                        </script>');
            }  
        }
    }
}
if (strpos($_SERVER['REQUEST_URI'], "delete.php?Productid=") !== false){
    $id = $_GET['Productid'];
    
    $query = "SELECT * FROM products WHERE product_id = '$id'";
    $run_query = mysqli_query($con, $query);

    foreach($run_query as $product){
        $image = $product['product_image'];
        if(unlink("assets/img/products/$image")){
            
            $id = $_GET['Productid'];
            
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