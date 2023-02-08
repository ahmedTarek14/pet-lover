<?php session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");
if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    if(isset($_POST["accept"]))
    {
        $book_id=intval($_POST['book_id']);
        $accept=intval($_POST['accept']);
        $sql="UPDATE booking SET book_state='$accept',book_admin_id=$_SESSION[admin_id] WHERE book_id = '$book_id'";
        mysqli_query($con,$sql);
    }
    if(isset($_POST["decline"]))
    {
        $book_id=intval($_POST['book_id']);
        $decline=intval($_POST['decline']);
        $sql="UPDATE booking SET book_state='$decline',book_admin_id=$_SESSION[admin_id] WHERE book_id = '$book_id'";
        mysqli_query($con,$sql);
    }
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
                    <h2 class="left">Pending Booking Requests</h2>
                </div>
                <!-- End Box Head -->
                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                            <th>Booking ID</th>
                            <th>Username</th>
                            <th>E-mail of User</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Service</th>                
                            <th width="120" class="ac">Content Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                if($row['book_state']==NULL)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['book_id']; ?>
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
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                                <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>" />
                                                <button name="accept" value="2" style="background-color:forestgreen; color:white; font-size:15px; border:0px; border-radius:5px; padding:5px;">Accept</button>
                                                <button name="decline" value="1" style="background-color:red; color:white; font-size:15px; border:0px; border-radius:5px; padding:5px;">Decline</button>
                                            </form>             
                                        </td> 
                                    </tr>
                                <?php
                                }
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
    ###############################################################################################################################################################################
    if(isset($_POST["accept_contact"]))
    {
        $contact_id=intval($_POST['contact_id']);
        $accept_contact=intval($_POST['accept_contact']);
        $sql="UPDATE contact SET contact_state='$accept_contact',contact_admin_id=$_SESSION[admin_id] WHERE contact_id = '$contact_id'";
        mysqli_query($con,$sql);
    }
    if(isset($_POST["decline_contact"]))
    {
        $contact_id=intval($_POST['contact_id']);
        $decline_contact=intval($_POST['decline_contact']);
        $sql="UPDATE contact SET contact_state='$decline_contact',contact_admin_id=$_SESSION[admin_id] WHERE contact_id = '$contact_id'";
        mysqli_query($con,$sql);
    }
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
?>
<div class="box">
    <!-- Box Head -->
    <div class="box-head">
        <h2 class="left">Pending Contact Requests</h2>
    </div>
    <!-- End Box Head -->
    <!-- Table -->
    <div class="table">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th width="120" class="ac">Content Control</th>
                </tr>
            </thead>
            <tbody>
                <?php
            while($row = mysqli_fetch_array($result))
            {
                if($row['contact_state']==NULL)
                {
                ?>
                <tr>
                    
                    <td>
                        <h3>
                            <?php echo $row['contact_username']; ?>
                        </h3>
                    </td>

                    <td>
                        <?php echo $row['contact_phone']; ?>
                    </td>

                    <td>
                        <?php echo $row['contact_subject']; ?>
                    </td>

                    <td>
                        <?php echo $row['contact_message']; ?>
                    </td>
                    <td>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <input type="hidden" name="contact_id" value="<?php echo $row['contact_id']; ?>" />
                            <button name="accept_contact" value="2" style="background-color:forestgreen; color:white; font-size:15px; border:0px; border-radius:5px; padding:5px;">Call</button>
                            <button name="decline_contact" value="1" style="background-color:red; font-size:15px; color:white; border:0px; border-radius:5px; padding:5px;">Cancel</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
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