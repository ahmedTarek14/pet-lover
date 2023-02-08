<?php 
session_start();
include_once("framework/site_func.php");
      include_once("framework/config.php");
      include_once("header.php"); ?>
    <!-- Navbar End -->


    <!-- feedback Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Poll</h4>
            <h1 class="display-4 m-0">Your Opinion Helps Us<span class="text-primary"> Do More</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $feedback_name = validate($_POST['feedback_name']);
                        $feedback_comment = validate($_POST['feedback_comment']);
                        if($feedback_name!=NULL && $feedback_comment!=NULL)
                        {
                            $sql ="INSERT INTO feedback VALUES(NULL,'$feedback_name','$feedback_comment',$_SESSION[user_id])";
                            $result = mysqli_query($con,$sql);
                            if($result)
                            {
                                output_msg("s","Message Sent");
                                redirect(5,"index.php");
                            }
                            else
                            {
                                output_msg();
                            }
                        }
                        else
                        {
                            output_msg("f","fill all data right");
                            redirect(5,"feedback.php");
                        }
                    }
                    else
                    {
                    ?><!--name="sentMessage" id="contactForm" novalidate="novalidate"-->
                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="control-group">
                            <input name="feedback_name"  type="text" class="form-control p-4" id="name" placeholder="Your Name (ex. <?php echo $_SESSION['user_username']; ?>)" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="feedback_comment" class="form-control p-4" rows="6" id="message" placeholder="Your Feedback" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name="submit">Send Message</button>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php include_once("footer.php"); ?>
    <!-- Footer End -->




