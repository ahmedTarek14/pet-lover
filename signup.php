<?php
include_once("framework/site_func.php");
include_once("framework/config.php");
    include_once("header.php");
    if(isset($_POST['submit']))
    {
        $user_username = validate($_POST['user_username']);
        $user_password = validate($_POST['user_password']);
        $user_mail    = validate($_POST['user_mail']);
        $user_password = enc_pass($user_password);
        $sql ="INSERT INTO user VALUES(NULL,'$user_username','$user_password','$user_mail')";
        $result = mysqli_query($con,$sql);
        if($result)
        {
                redirect(0,"login.php");
        }
        else
        {
            output_msg();
        }


    }
    else
    {
?>
<div class="container-fluid">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="bg-primary py-5 px-4 px-sm-5">
                    <form class="py-5" method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <input type="text" name="user_username" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                        </div>

                        <div class="form-group">
                            <input type="password" name="user_password" class="form-control border-0 p-4" placeholder="Your Password" required="required" />
                        </div>

                        <div class="form-group">
                            <input type="email" name="user_mail" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                        </div>

                        <div>
                            <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="submit">Sign Up Now</button>

                            <a href="login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">
                                Already Have Account !
                            </a>
                        </div>

                       
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Perplexed?</h4>
                <h1 class="display-4 mb-4">
                    Join Us For <span class="text-primary">Your Pet</span>
                </h1>
                <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum</p>
            </div>
        </div>
    </div>
</div>
<?php
    }
    include_once("footer.php");
?>
