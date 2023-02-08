<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");
if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    if(isset($_POST['submit']))
    {
        $admin_username = validate($_POST['admin_username']);
        $admin_password1 = validate($_POST['admin_password1']);
        $admin_password2 = validate($_POST['admin_password2']);
        $admin_email    = validate($_POST['admin_email']);
        if($admin_username!=NULL && $admin_password1!=NULL && $admin_email!=NULL && $admin_password2!=NULL && $admin_password1==$admin_password2)
        {
            $admin_password1 = enc_pass($admin_password1);
            $sql ="INSERT INTO admin VALUES(NULL,'$admin_username','$admin_password1','$admin_email')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                output_msg("s","Account Added");
                redirect(2,"show_admin.php");
            }
            else
            {
                output_msg();
            }
        }
        else
        {
            output_msg("f","fill all data right");
            redirect(2,"add_admin.php");
        }
    }
    else
    {
?>
                        <div class="box">
                <!-- Box Head -->
                <div class="box-head">
                    <h2>Add Admin</h2>
                </div>
                <!-- End Box Head -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Form -->
                    <div class="form">
                        <p>
                            <label>
                                Username <span>(Required Field)</span>
                            </label>
                            <input type="text" name="admin_username" class="field size1" />
                        </p>
                        <p>
                            <label>
                                 Password <span>(Required Field)</span>
                            </label>
                            <input type="password" name="admin_password1" class="field size1" />
                        </p>
                        <p>
                            <label>
                                Confirm Password <span>(Required Field)</span>
                            </label>
                            <input type="password" name="admin_password2" class="field size1" />
                        </p>
                        <p>
                            <label>
                                Email <span>(Required Field)</span>
                            </label>
                            <input type="email" name="admin_email" class="field size1" />
                        </p>

                    </div>
                    <!-- End Form -->
                    <!-- Form Buttons -->
                    <div class="buttons">
                        <button type="submit" name="submit" class="button">
                            Add Admin
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