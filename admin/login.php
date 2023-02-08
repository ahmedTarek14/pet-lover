<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pet Lover</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Pet Lover</a></h1>
      <div id="top-navigation"> Welcome <strong>Administrator</strong></div>
    </div>
    <!-- End Logo + Top Nav -->
  </div>
</div>
<!-- End Header -->

    <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Sign In</h2>
          </div>
          <!-- End Box Head -->
        <?php
        if(isset($_POST['submit']))
        {
            $admin_username = validate($_POST['admin_username']);
            $admin_password = validate($_POST['admin_password']);

            if($admin_username!=NULL && $admin_password!=NULL)
            {
                $admin_password = enc_pass($admin_password);

                $sql = "SELECT * FROM admin WHERE
                            admin_username='$admin_username'
                            and
                            admin_password='$admin_password'";
                $result = mysqli_query($con,$sql);

                if($result)
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $row_admin = mysqli_fetch_array($result);
                        $_SESSION['admin_login']="yes";
                        $_SESSION['admin_id']= $row_admin['admin_id'];
                        $_SESSION['admin_username']= $row_admin['admin_username'];
                        $_SESSION['admin_email']= $row_admin['admin_email'];
                        redirect(0,"index.php");
                    }
                    else
                    {
                        output_msg("f","Wrong username or password");
                        redirect(0,"index.php");
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
                redirect(2,"index.php");
            }

        }
        else
        {
        ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <!-- Form -->
                        <div class="form">
                          <p>
                            <label>Username <span>(Required Field)</span></label>
                            <input type="text" class="field size1" name="admin_username" />
                          </p>
                            <p>
                            <label>Password <span>(Required Field)</span></label>
                                <input type="password" class="field size1" name="admin_password" />
                          </p>
                        </div>
                        <!-- End Form -->
                        <!-- Form Buttons -->
                        <div class="buttons">
                          <button type="submit" class="button" name="submit">sign in</button>
                        </div>
                        <!-- End Form Buttons -->
                      </form>
                    


        <?php
        }
        ?>
    </div>
<?php include_once("footer.php"); ?>
