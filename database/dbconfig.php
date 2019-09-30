<?php
    $servername = "localhost";

     $username = "root";
     $password = "";
     $db = "automac_db";

//    $username = "u566597010_root";
//    $password = "alyadesign";
//    $db = "u566597010_mydb";

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>