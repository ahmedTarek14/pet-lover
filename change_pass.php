<?php
session_start();
include_once("framework/site_func.php");
include_once("framework/config.php");
include_once("header.php");?>
<!-- Navbar End -->


<!-- change Start -->
<div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Change Password</h4>
        <h1 class="display-4 m-0">
            No One Must Be Know Your<span class="text-primary"> Password</span>
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
                        $user_password1 = validate($_POST['user_password1']);
                        $user_password2 = validate($_POST['user_password2']);

                        if($user_password1!=NULL && $user_password2!=NULL && $user_password1==$user_password2)
                        {
                            $user_password1 = enc_pass($user_password1);
                            $sql = "UPDATE user SET user_password='$user_password1' WHERE user_id=$_SESSION[user_id]";
                            $result = mysqli_query($con,$sql);
                            if($result)
                            {
                                output_msg("s","password Changed , Please Sign In Again.");
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
                            redirect(1,"change_pass.php");
                        }
                    }
                }
                else
                {
                ?><!--name="sentMessage" id="contactForm" novalidate="novalidate"-->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="control-group">
                        <input name="user_password1" type="text" class="form-control p-4" id="name" placeholder="New Password" required="required" data-validation-required-message="Please enter your password" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input name="user_password2" type="text" class="form-control p-4" id="name" placeholder="Confirm New Password" required="required" data-validation-required-message="Please enter your password" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name="submit">Change Password</button>
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
