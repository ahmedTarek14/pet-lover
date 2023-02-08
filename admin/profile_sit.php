<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");
if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    if(isset($_POST['submit']))
    {
        $admin_password1 = validate($_POST['admin_password1']);
        $admin_password2 = validate($_POST['admin_password2']);
        if($admin_password1!=NULL && $admin_password2!=NULL && $admin_password1==$admin_password2)
        {
            $admin_password1 = enc_pass($admin_password1);
            $sql = "UPDATE admin SET admin_password='$admin_password1' WHERE admin_id=$_SESSION[admin_id]";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                output_msg("s","Password Changed , Please Sign In Again.");
                session_destroy();
                redirect(3,"index.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","Please fill Field Right");
            redirect(1,"profile_sit.php");
        }
    }
    else if (isset($_POST['submit_username']))
        {
            $admin_username1 = validate($_POST['admin_username1']);
            $admin_username2 = validate($_POST['admin_username2']);

            if($admin_username1!=NULL && $admin_username2!=NULL && $admin_username1==$admin_username2)
            {
                $sql = "UPDATE admin SET admin_username='$admin_username1' WHERE admin_id=$_SESSION[admin_id]";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    output_msg("s","username Changed , Please Sign In Again.");
                    session_destroy();
                    redirect(3,"index.php");

                }
                else
                {
                    output_msg();
                }
            }
            else
            {
                output_msg("f","Please fill Field Right");
                redirect(1,"profile_sit.php");
            }
        }
    else
    {
?>
<div class="box">
    <!-- Box Head -->
    <div class="box-head">
        <h2>Change Password</h2>
    </div>
    <!-- End Box Head -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <!-- Form -->
        <div class="form">
            <p>
                <label>
                    New Password <span>(Required Field)</span>
                </label>
                <input type="password" name="admin_password1" class="field size1" />
            </p>
            <p>
                <label>
                    Confirm Password <span>(Required Field)</span>
                </label>
                <input type="password" name="admin_password2" class="field size1" />
            </p>

        </div>
        <!-- End Form -->
        <!-- Form Buttons -->
        <div class="buttons">
            <button type="submit" name="submit" class="button">
                update password
            </button>
        </div>
        <!-- End Form Buttons -->
    </form>
</div>



<div class="box">
    <!-- Box Head -->
    <div class="box-head">
        <h2>Change Username</h2>
    </div>
    <!-- End Box Head -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <!-- Form -->
        <div class="form">
            <p>
                <label>
                    New Username <span>(Required Field)</span>
                </label>
                <input type="text" name="admin_username1" class="field size1" />
            </p>
            <p>
                <label>
                    Confirm Username <span>(Required Field)</span>
                </label>
                <input type="text" name="admin_username2" class="field size1" />
            </p>

        </div>
        <!-- End Form -->
        <!-- Form Buttons -->
        <div class="buttons">
            <button type="submit" name="submit_username" class="button">
                update username
            </button>
        </div>
        <!-- End Form Buttons -->
    </form>
</div>

<?php
    }

    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>


