<?php
session_start();
include_once("framework/site_func.php");
include_once("framework/config.php");
include_once("header.php");
if(isset($_SESSION['user_login']))
{
    redirect(0,"index.php");
}
else
{
    if(isset($_POST['submit']))
    {
        $user_username = validate($_POST['user_username']);
        $user_password = validate($_POST['user_password']);

        if($user_username!=NULL && $user_password!=NULL)
        {
            $user_password = enc_pass($user_password);

            $sql = "SELECT * FROM user WHERE
                            user_username='$user_username'
                            and
                            user_password='$user_password'";
            $result = mysqli_query($con,$sql);

            if($result)
            {
                if(mysqli_num_rows($result)>0)
                {
                    $row_user = mysqli_fetch_array($result);
                    $_SESSION['user_login']="yes";
                    $_SESSION['user_id']= $row_user['user_id'];
                    $_SESSION['user_username']= $row_user['user_username'];
                    $_SESSION['user_mail']= $row_user['user_mail'];
                    redirect(0,"index.php");
                }
                else
                {
                    output_msg("f","Wrong username or password");
                    redirect(1,"login.php");
                }
            }
            else
            {
                output_msg();
            }


        }
        else
        {
            output_msg("f","Please fill Required Fields");
            redirect(2,"login.php");
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

                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="submit">Log In Now</button>
                                </div>

                                <div>
                                    <a href="signup.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">
                                        Create New Account
                                    </a>
                                </div>

                            </form>
                            
                        </div>
                    </div>
                    <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                        <h4 class="text-secondary mb-3">Welcome</h4>
                        <h1 class="display-4 mb-4">
                            Your Pet <span class="text-primary">In Safe</span>
                        </h1>
                        <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
    include_once("footer.php"); ?>