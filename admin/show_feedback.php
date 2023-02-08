<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");

    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
?>
<div class="box">
    <!-- Box Head -->
    <div class="box-head">
        <h2 class="left">Feedbacks</h2>
    </div>
    <!-- End Box Head -->
    <!-- Table -->
    <div class="table">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            while($row = mysqli_fetch_array($result))
                            {              
                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['feedback_id']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['feedback_user_id']; ?>
                                        </td>
                    
                                        <td>
                                            <h3>
                                                <?php echo $row['feedback_name']; ?>
                                            </h3>
                                        </td>
                                        <td>
                                            <?php echo $row['feedback_message']; ?>
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
