<?php
session_start();
include_once("framework/site_func.php");
include_once("framework/config.php");
include_once("header.php");
?>
<!-- Navbar End -->


<!-- Pricing Plan Start -->
<div class="container-fluid bg-light pt-5 pb-4">
    <div class="container py-5">
        <div class="d-flex flex-column text-center mb-5">
            <h1 class="display-4 m-0">
                Your <span class="text-primary">Requests</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <?php
                $sql = "SELECT * FROM booking";
                $result = mysqli_query($con,$sql);

                if($result)
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        ?>
                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Booking Date</th>
                                        <th>Booking Time</th>
                                        <th>Service</th>
                                        <th>States</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    if($row['book_user_id']==$_SESSION['user_id'])
                                    {
                                    ?>
                                    <tr>
                                
                                
                                        <td>
                                                <?php echo $row['book_name']; ?>
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
                                            <?php
                                        if($row['book_state']==2)
                                        {
                                            ?>
                                            <h1 style="font-size:16px; color:forestgreen;">Accepted</h1>
                                            <?php
                                        }
                                        else if($row['book_state']==1)
                                        {
                                            ?>
                                            <h1 style="font-size:16px; color:red;">Declined</h1>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <h1 style="font-size:16px; color:blue;">Pendding</h1>
                                            <?php
                                        }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
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
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Pricing Plan End -->




<!-- Footer Start -->
<?php include_once("footer.php"); ?>
<!-- Footer End -->
