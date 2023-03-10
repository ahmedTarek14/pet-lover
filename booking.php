<?php 
session_start();
include_once("framework/site_func.php");
include_once("framework/config.php");
include_once("header.php"); ?>
<!-- Navbar End -->
<!-- Services Start -->
<div class="container-fluid bg-light pt-5">
   <div class="container py-5">
      <div class="row pb-3">
         <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
               <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
               <h3 class="mb-3">Pet Boarding</h3>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
            </div>
         </div>
         <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
               <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
               <h3 class="mb-3">Pet Feeding</h3>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
            </div>
         </div>
         <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
               <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
               <h3 class="mb-3">Pet Grooming</h3>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Services End -->
<!-- Booking Start -->
<div class="container-fluid">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-5">
            <div class="bg-primary py-5 px-4 px-sm-5">
               <?php 
               if(isset($_SESSION['user_login'])) 
               {?>
               <?php
                         if(isset($_POST['submit']))
                         {
                             $book_name = validate($_POST['book_name']);
                             $book_email = validate($_POST['book_email']);
                             $book_date = validate($_POST['book_date']);
                             $book_date=date("Y-m-d",strtotime($book_date));
                             $book_time = validate($_POST['book_time']);
                             $book_service = validate($_POST['book_service']);
                             if($book_name!=NULL && $book_email!=NULL && $book_date!=NULL && $book_time!=NULL && $book_service!=NULL)
                             {
                                 $sql ="INSERT INTO booking VALUES(NULL,'$book_name','$book_email','$book_date','$book_time','$book_service',$_SESSION[user_id],NULL,NULL)";
                                 $result = mysqli_query($con,$sql);
                                 if($result)
                                 {
                                     output_msg("s","Book Done");
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
                                 redirect(5,"booking.php");
                             }
                         }
                         else
                         {
               ?>
                           <form class="py-5" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                              <div class="form-group">
                                 <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" name="book_name" value="<?php echo $_SESSION['user_username']; ?>" data-validation-required-message="Please enter your name"/>
                              </div>
                              <div class="form-group">
                                 <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" name="book_email" value="<?php echo $_SESSION['user_mail']; ?>" data-validation-required-message="Please enter your email"/>
                              </div>
                              <div class="form-group">
                                 <div class="date" id="date" data-target-input="nearest">
                                    <input type="date" name="book_date" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Date"  data-toggle="datetimepicker" required="required" data-validation-required-message="Please enter date"/>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" name="book_time" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Time" data-target="#time" data-toggle="datetimepicker" required="required" data-validation-required-message="Please enter time"/>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <select class="custom-select border-0 px-4" name="book_service" style="height: 47px;">
                                    <option selected value="Pet Boarding">Pet Boarding</option>
                                    <option value="Pet Feeding">Pet Feeding</option>
                                    <option value="Pet Grooming">Pet Grooming</option>
                                    <option value="Per Training">Per Training</option>
                                    <option value="Pet Exercise">Pet Exercise</option>
                                    <option value="Pet Treatment">Pet Treatment</option>
                                 </select>
                              </div>
                              <div>
                                 <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="submit">Book Now</button>
                              </div>
                           </form>
               <?php 
                         }
               }
                     else 
                     {?>
               <form class="py-5">
                  <div class="form-group">
                     <input type="text" style="visibility:hidden;" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                  </div>
                  <div class="form-group">
                     <input type="email" style="visibility:hidden;" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                  </div>
                  <div class="form-group">
                     <div class="date" id="date" data-target-input="nearest">
                        <input type="text" style="display:none;" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Date" data-target="#date" data-toggle="datetimepicker"/>
                     </div>
                     <div>
                        <a class="btn btn-dark btn-block border-0 py-3" href="signup.php">Signup Now To Book For Your Pet</a>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="time" id="time" data-target-input="nearest">
                        <input type="text" style="visibility:hidden;" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Time" data-target="#time" data-toggle="datetimepicker"/>
                     </div>
                  </div>
                  <div class="form-group">
                     <select class="custom-select border-0 px-4" style="visibility:hidden;" style="height: 47px;">
                        <option selected>Pet Boarding</option>
                        <option value="1">Pet Feeding</option>
                        <option value="2">Pet Grooming</option>
                        <option value="3">Per Training</option>
                        <option value="4">Pet Exercise</option>
                        <option value="5">Pet Treatment</option>
                     </select>
                  </div>
               </form>
               <?php 
                     }?>
            </div>
         </div>
         <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
            <h4 class="text-secondary mb-3">Going for a vacation?</h4>
            <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
            <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum</p>
            <div class="row py-2">
               <div class="col-sm-6">
                  <div class="d-flex flex-column">
                     <div class="d-flex align-items-center mb-2">
                        <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                        <h5 class="text-truncate m-0">Pet Boarding</h5>
                     </div>
                     <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="d-flex flex-column">
                     <div class="d-flex align-items-center mb-2">
                        <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                        <h5 class="text-truncate m-0">Pet Feeding</h5>
                     </div>
                     <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="d-flex flex-column">
                     <div class="d-flex align-items-center mb-2">
                        <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                        <h5 class="text-truncate m-0">Pet Grooming</h5>
                     </div>
                     <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="d-flex flex-column">
                     <div class="d-flex align-items-center mb-2">
                        <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                        <h5 class="text-truncate m-0">Pet Tranning</h5>
                     </div>
                     <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Booking Start -->
<!-- Pricing Plan Start 
<div class="container-fluid bg-light pt-5 pb-4">
   <div class="container py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3">Pricing Plan</h4>
         <h1 class="display-4 m-0">Choose the <span class="text-primary">Best Price</span></h1>
      </div>
      <div class="row">
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="img/price-1.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-primary mb-3">Basic</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Spa & Grooming</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Veterinary Medicine</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="<?php if(isset($_SESSION['user_login'])){echo"#";}else{echo"signup.php";} ?>" class="btn btn-primary btn-block p-3" style="border-radius: 0;"><?php if(isset($_SESSION['user_login'])){echo"Buy Now";}else{echo"Signup Now";} ?></a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="img/price-2.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-secondary mb-3">Standard</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Spa & Grooming</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Veterinary Medicine</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="<?php if(isset($_SESSION['user_login'])){echo"#";}else{echo"signup.php";} ?>" class="btn btn-secondary btn-block p-3" style="border-radius: 0;"><?php if(isset($_SESSION['user_login'])){echo"Buy Now";}else{echo"Signup Now";} ?></a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="img/price-3.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-primary mb-3">Premium</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Spa & Grooming</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Veterinary Medicine</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="<?php if(isset($_SESSION['user_login'])){echo"#";}else{echo"signup.php";} ?>" class="btn btn-primary btn-block p-3" style="border-radius: 0;"><?php if(isset($_SESSION['user_login'])){echo"Buy Now";}else{echo"Signup Now";} ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Pricing Plan End -->
<!-- Footer Start -->
<?php include_once("footer.php"); ?>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>
<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>