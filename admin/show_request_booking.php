<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");

    $sql = "SELECT * FROM booking";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
?>
<div class="box">
    <!-- Box Head -->
    <div class="box-head">
        <h2 class="left">Requests Done !</h2>
    </div>
    <!-- End Box Head -->
    <!-- Table -->
    <div class="table">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>E-mail of User</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Service</th>
                    <th>Name Of Admin</th>
                    <th >States</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                if($row['book_state']!=NULL)
                                {
                                $sql_admin = "SELECT * FROM admin WHERE admin_id = $row[book_admin_id]";
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
                                }

                               
                ?>
                <tr>
                    <td>
                        <?php echo $row['book_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['book_user_id']; ?>
                    </td>
                    <td>
                        <h3>
                            <?php echo $row['book_name']; ?>
                        </h3>
                    </td>

                    <td>
                        <?php echo $row['book_email']; ?>
                    </td>

                    <td>
                        <?php echo $row['book_date']; ?>
                    </td>

                    <td>
                        <?php echo $row['book_time']; ?>
                    </td>

                    <td>
                        <?php echo $row['book_service']; ?>
                    </td>
                    <td>
                        <?php if($row['book_state']==NULL)
                                                  { echo "N/A";} else { echo $admin_username; }
                        ?>
                    </td>
                    <td>
                        <?php
                                    if($row['book_state']==2)
                                    {
                        ?>
                        <h1 style="font-size:12px; color:forestgreen;">Accepted</h1>
                        <?php
                                    }
                                    else if($row['book_state']==1)
                                    {
                        ?>
                        <h1 style="font-size:12px; color:red;">Declined</h1>
                        <?php
                                    }
                                    else
                                    {
                        ?>
                        <h1 style="font-size:12px; color:blue;">Waiting</h1>
                        <?php
                                    }
                        ?>
                    </td>
                </tr>
                <?php
                                
                            }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Table -->
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
