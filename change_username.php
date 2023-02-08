<?php
session_start();
include_once("framework/site_func.php");
include_once("framework/config.php");
include_once("header.php");?>
<!-- Navbar End -->


<!-- change Start -->
<div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Change Username</h4>
        <h1 class="display-4 m-0">
            You Must Save Your Username<span class="text-primary"> It So Important</span>
        </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <?php
                if(isset($_POST['submit']))
                {
                    {
                        $user_username1 = validate($_POST['user_username1']);
                        $user_username2 = validate($_POST['user_username2']);

                        if($user_username1!=NULL && $user_username2!=NULL && $user_username1==$user_username2)
                        {
                            $sql = "UPDATE user SET user_username='$user_username1' WHERE user_id=$_SESSION[user_id]";
                            $result = mysqli_query($con,$sql);
                            if($result)
                            {
                                output_msg("s","username Changed , Please Sign In Again.");
                                session_destroy();
                                redirect(3,"login.php");

                            }
                            else
                            {
                                output_msg();
                            }
                        }
                        else
                        {
                            output_msg("f","Please fill Field Right");
                            redirect(1,"change_username.php");
                        }
                    }
                }
                else
                {
                    ?><!--name="sentMessage" id="contactForm" novalidate="novalidate"-->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="control-group">
                            <input name="user_username1" type="text" class="form-control p-4" id="name" placeholder="(Old Username : <?php echo $_SESSION['user_username']; ?>) Please Enter New Username" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="user_username2" type="text" class="form-control p-4" id="name" placeholder="Confirm New Username" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name="submit" >Change Username</button>
                        </div>
                    </form>
                    <?php
                }
                    ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Footer Start -->
<?php include_once("footer.php"); ?>
<!-- Footer End -->
