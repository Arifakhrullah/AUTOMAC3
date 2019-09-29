<?php
    require('database/dbconfig.php');
    ob_start();
    session_start();
?>
<?php
    //This prevents anyone from directly accessing header.php
    if(strpos($_SERVER['REQUEST_URI'], basename("header.php")) !== false){
        echo("<script LANGUAGE='JavaScript'>
            window.alert('Direct access to this page are not permitted!');
            window.location.href='index.php';
            </script>");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="ALY.A, a fashion & design online gallery by Aliazuraini">
    <meta name="author" content="Arif Fakhrullah">

    <!-- Browser TAB Icon -->
    <link rel="icon" href="assets/logo/favicon.ico">

    <title>AUTOMAC MULTIRESOURCES</title>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="css/ie-emulation-modes-warning.js.download"></script>

    <!-- Local Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/custom/style.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!-- FontAwesome  -->
        <!-- CDN -->
            <!-- Seems to not work, but using local will do -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Local -->
            <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-fixed-top wow fadeInDown">
        <div class="container">
            <div class="navbar-header">
                <button type="button"
                        class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#navbar"
                        aria-expanded="false"
                        aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    if(!isset($_GET['admin']) || !isset($_SESSION['user_name'])){
                        echo '<a class="navbar-brand" id="logo" style="padding: 0;" href="index.php">
                                    <img class="img-responsive" style="height: 3.5em; margin: 0;" src="assets/logo/logo.png">

                            </a>';
                    } else {
                        echo '<a class="navbar-brand-admin" id="logo" href="admin.php?admin=1">Admin</a>';
                    }

                ?>
            </div>

            <div class="navbar-collapse collapse" id="navbar">
                <?php
                    if(!isset($_GET['admin']) || !isset($_SESSION['user_name'])){

                ?>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_selection.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administration.php">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventures.php">Company Venture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php#contact">Contact Us</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <div class="searchbar visible-lg visible-md visible-sm">
                            <form action="results.php" method="GET" enctype="multipart/form-data">
                                <input class="search_input" type="text" name="query" placeholder="I am looking for....">
                                <a type="submit" name="search" class="search_icon"><i class="fas fa-search"></i></a>
                            </form>
                        </div>
                    </li>
                    <li class="nav-signin">
                        <a class="nav-link" data-target="#signinModal" data-toggle="modal">Sign In</a>
                    </li>
                </ul>
                <?php
                    } else {
                        echo '<ul class="nav navbar-nav navbar-right">
                                <li class="nav-signin"><a href="logout.php">Log Out</a></li>
                            </ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <!-- Modal for sign in -->
    <div class="modal fade" id="signinModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <p><?php require "signin.php"; ?></p>
                </div>
            </div>
        </div>
    </div>
