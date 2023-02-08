<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");

    $sql = "SELECT * FROM price";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
?>
            <div class="box">
                <!-- Box Head -->
                <div class="box-head">
                    <h2 class="left">View Prices</h2>
                </div>
                <!-- End Box Head -->
                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>ID</th>
                            <th>Name Package</th>
                            <th>Price</th>
                            
                            <th>Admin Name</th><th width="110" class="ac">Price Control</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            while($row=mysqli_fetch_array($result))
                            {

                                $sql_admin = "SELECT * FROM admin WHERE admin_id = $row[price_admin_id]";
                                $result_admin = mysqli_query($con,$sql_admin);
                                if($result_admin)
                                {
                                    if(mysqli_num_rows($result_admin)>0)
                                    {
                                        $row_admin = mysqli_fetch_array($result_admin);
                                        $admin_username = $row_admin['admin_username'];
                                    }
                                    else
                                    {
                                        $admin_username="N/A";
                                    }

                                }
                                else
                                {
                                    output_msg();
                                }

                                ?>

                                <tr>
                                    <td>
                                        <?php echo $row['price_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price_value']; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin_username; ?>
                                    </td>
                                    <td>
                                        <a href="edit_price.php?price_id=<?php echo $row['price_id']; ?>" class="ico edit">Edit</a>
                                    </td>
                                    
                                    
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        else
        {
            output_msg("f","There is no data.");
            redirect(2,"index.php");
        }
    }
    else
    {
        output_msg();
    }

    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>
