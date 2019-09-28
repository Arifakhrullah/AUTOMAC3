        <?php
            //This prevents anyone from directly accessing header.php
            if(strpos($_SERVER['REQUEST_URI'], basename("footer.php")) !== false){
                echo("<script LANGUAGE='JavaScript'>
                    window.alert('Direct access to this page are not permitted!');
                    window.location.href='index.php';
                    </script>");    
            }
        ?>
        <div class="container">
            <div class="row">
<!--                <hr class="gold-line">-->
                <h5 class="text-center text__gold">&copy; ALYA Fashion &amp; Design By Alia Alli <br> &bull; 2018 - <?php echo date("Y"); ?> &bull;</h5>
                <div class="text-center center-block">
                    <ul class="social-network social-circle">
                            <li><a href="https://www.instagram.com/alya" class="icoInstagram" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                </div>
            </div>
        </div>
        <!-- JavaScript -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/navshrink.js"></script>
        <script src="js/isotopeSort.js"></script>
        <script src="js/movingLetters.js"></script>
        <script src="js/movingLetters2.js"></script>
        <script src="js/searchOpen.js"></script>
        <script src="js/searchBlur.js"></script>
        <script src="js/dataTable.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--    <script src="css/jquery.min.js.download"></script>-->
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <script src="css/bootstrap.min.js.download"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="css/ie10-viewport-bug-workaround.js.download"></script>
    </body>       
</html>