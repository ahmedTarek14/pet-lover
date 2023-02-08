<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");

    if(isset($_GET['price_id']))
    {
        $price_id = intval($_GET['price_id']);

        $sql =  "SELECT * FROM price WHERE price_id=$price_id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row_old_price = mysqli_fetch_array($result);

                if(isset($_POST['submit']))
                {
                    $price_value = intval($_POST['price_value']);
                    $price_value2 = intval($_POST['price_value2']);
                    if($price_value!=NULL && $price_value==$price_value2 && $price_value>0)
                    {


                        $sql = "UPDATE price
                                        SET
                                        price_value='$price_value',
                                        price_admin_id=$_SESSION[admin_id]
                                        WHERE price_id=$price_id";
                        $result = mysqli_query($con,$sql);

                        if($result)
                        {
                            output_msg("s","Category Updated");
                            redirect(2,"show_price.php");
                        }
                        else
                        {
                            output_msg();
                        }
                    }
                    else
                    {
                        output_msg("f","Please fill all fields");
                        redirect(2,"edit_price.php?price_id=$price_id");
                    }
                }
                else
                {
?>
                    <div class="box">
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2>Change Price</h2>
                        </div>
                        <!-- End Box Head -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?price_id=$price_id"); ?>">
                            <!-- Form -->
                            <div class="form">
                                <p>
                                    <label>
                                        New Price <span>(Required Field)</span>
                                    </label>
                                    <input type="number" name="price_value" class="field size1" />
                                </p>
                                <p>
                                    <label>
                                        Confirm Price <span>(Required Field)</span>
                                    </label>
                                    <input type="number" name="price_value2" class="field size1" />
                                </p>

                            </div>
                            <!-- End Form -->
                            <!-- Form Buttons -->
                            <div class="buttons">
                                <button type="submit" name="submit" class="button">
                                    update price
                                </button>
                            </div>
                            <!-- End Form Buttons -->
                        </form>
                    </div>
                    <?php
                }
            }
            else
            {
                output_msg("f","Unexpected Error 1");
            
            }
        }
        else
        {
            output_msg();
        }
    }
    else
    {
        output_msg("f","Unexpected Error");
    }


    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>