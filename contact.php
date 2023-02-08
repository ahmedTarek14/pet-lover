<?php 
session_start();
include_once("framework/site_func.php");
      include_once("framework/config.php");
      include_once("header.php"); ?>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Contact Us</h4>
            <h1 class="display-4 m-0">Contact For <span class="text-primary">Any Query</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $contact_username = validate($_POST['contact_username']);
                        $contact_email = validate($_POST['contact_email']);
                        $contact_phone = validate($_POST['contact_phone']);
                        $contact_subject = validate($_POST['contact_subject']);
                        $contact_message = validate($_POST['contact_message']);
                        if($contact_username!=NULL && $contact_email!=NULL && $contact_phone!=NULL && $contact_subject!=NULL && $contact_message!=NULL)
                        {
                            $sql ="INSERT INTO contact VALUES(NULL,'$contact_username','$contact_email','$contact_phone','$contact_subject','$contact_message',NULL,NULL)";
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
                            redirect(5,"contact.php");
                        }
                    }
                    else
                    {
                    ?><!--name="sentMessage" id="contactForm" novalidate="novalidate"-->
                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="control-group">
                            <input name="contact_username" <?php if(isset($_SESSION['user_login'])){ ?> value="<?php echo $_SESSION['user_username']; ?>" <?php } ?> type="text" class="form-control p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="contact_email" <?php if(isset($_SESSION['user_login'])){ ?> value="<?php echo $_SESSION['user_mail']; ?>" <?php } ?> type="email" class="form-control p-4" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="contact_phone" maxlength="11"  type="tel" class="form-control p-4" id="name" placeholder="Your Contact Number (ex. 01000000000)" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="contact_subject" type="text" class="form-control p-4" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="contact_message" class="form-control p-4" rows="6" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
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
            <div class="col-12 mb-n2 p-0">
                <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9567.0038345996!2d31.30800583727588!3d29.964681360162608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583852974b2f01%3A0x2acf69ef597c0dc8!2sHarmony%20vet%20clinic%20-%20HVC%20Maadi!5e0!3m2!1sen!2seg!4v1663649876202!5m2!1sen!2seg" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php include_once("footer.php"); ?>
    <!-- Footer End -->




