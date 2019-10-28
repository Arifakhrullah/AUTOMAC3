<?php include("header.php"); ?>
    <div class="container wow fadeInUp" style="padding-left: 20%; padding-right: 20%; padding-top: 30px;">
        <h2 class="text-center">Admin login</h2>
        <p class="text-center text-muted">Please enter Administrator password</p>
        <?php
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "SELECT * FROM users WHERE user_name='$username'";
                $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                $user = mysqli_fetch_array($run_query);

                if($user['user_name'] != ''){
                    if($user['user_name'] == $username){
                        if($user['user_password'] == $password){
                            $_SESSION['user_name'] = $user['user_name'];
                            header("Location: admin.php?admin=1");
                        } else {
                            echo "<br><div class='alert alert-danger'>Incorrect password, please try again</div>";
                        }
                    } else {
                        //Check if user exists in database
                        echo "<br><div class='alert alert-danger'>Username does not exist in the database, please try again.</div>";
                    }
                } else {
                    echo "<br><div class='alert alert-danger'>Please enter a username</div>";
                }
            }
        ?>
        <form method="POST">
            <div class="form-group">
                <input type="hidden" value="Admin" hidden name="username" class="form-control" id="username" style="background-color: transparent; border: 0; box-shadow: none;">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control" id="password">
            </div>
            <hr>
            <button type="submit" name="login" class="btn btn-default">Login</button>

        </form>
</div>
<?php include("footer.php"); ?>