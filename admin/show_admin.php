<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");
if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    $sql = "SELECT admin_id,admin_username,admin_email FROM admin";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
            <div class="box">
                <!-- Box Head -->
                <div class="box-head">
                    <h2 class="left">View All Admins</h2>
                </div>
                <!-- End Box Head -->
                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th width="110" class="ac">Admin Control</th>
                        </tr>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['admin_id']; ?>
                                </td>
                                <td>
                                    <h3>
                                        <?php echo $row['admin_username']; ?>
                                    </h3>
                                </td>
                                
                                <td>
                                    <?php echo $row['admin_email']; ?>
                                </td>
                                <td>
                                    <?php
                                if($row['admin_id']==1 || $row['admin_id']==$_SESSION['admin_id'])
                                    {
                                    ?>
                                    <a style="cursor: not-allowed;" class="ico del">Delete</a>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    
                                    <a href="del_admin.php?admin_id=<?php echo $row['admin_id']; ?>" class="ico del">Delete</a>
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
            output_msg("f","There Is No Data");
            redirect(2,"add_admin.php");
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