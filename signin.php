        <h4 class="text-center">Admin login</h4>
        <p class="text-center">Please enter your username and password</p>
        <form method="POST">
            <div class="form-group">
                <input type="text" placeholder="Username" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control" id="password">
            </div>
            <hr>
            <button type="submit" name="login" class="btn btn-default btn-block">Login</button>

        </form>
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
