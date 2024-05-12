<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;

$active_title = 'Home';

require_once __DIR__ . '/inc/header.php';

$active_class_nav_home = 'active_class';

$controllers->active_class($active_class_nav_home);


require_once __DIR__ . '/inc/navbar.php';



?>

<main>
       
       <!-- hero-aria section starts here -->
       <div class="hero-aria-section container-fluid  cus-bg-secondary-color">

           <div class="row">
               <div class="col-md-6 col-sm-12 text-centder text-light pt-5 mt-4">
                   <div class="container m-4 p-4">
                       <div class="fs-3">Learn New Technology</div>
                       <div class="fs-1 fw-bold">Dahuk:</div>
                       <div class="fs-2 ">Fuel your passion and become a part of something extraordinary</div>
                       <div class="btn cus-bg-primary-color hero_get_started_btn text-light mt-4 btn-lg">Get Started
                       </div>
                   </div>
                   <!-- <div class="container r">
                       <p class="fs-3 text">Learn New Technology</p>
                       <h1 class="fs-1 fw-bold text-left hero_dahuk">Dahuk :</h1>
                       <div class="fs-3 hero_desc text-left">Fuel your passion,and become a part of something
                           extraordinary</div>

                       <button class="btn cus-bg-primary-color text-light text-left"
                           style="text-align: left !important;">Get Started</button>

                   </div> -->

               </div>
               <div class="col-md-6 col-sm-12">
                   <img src="/assets/img/banner_img.png" class="img-fluid mt-5" alt="">
               </div>
           </div>

       </div>
       <!-- hero-aria section ends here -->

      <?php

        // catagory section starts here

        require_once __DIR__ . '/inc/catagory.php';

        // catagory section ends here


       ?>

       <!-- contact section starts here -->

       <div class="container-fluid">
           <div class="contact-section cus-bg-light-secondary-color">
               <div class="contact-section-title text-center mt-4 pt-4">
                   <div class="contact-title fs-1">
                       Contact With Us
                   </div>

                   <div class="contact-title-desc">
                       <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in <br> some form, by injected humour.</p>
                   </div>
               </div>







               <div class="contact-section-contents">
                   <div class="row">
                       <div class="col-md-6 col-sm-12 text-center">
                           <div class="  m-4 ">
                               <div class="row cus-bg-white">
                                   <div class="col-md-6 col-sm-12 container contact-border p-4">
                                       <i class="fa-solid fa-location-dot fs-2 mb-2" style="color: var(--custom-primary-color) !important;"
                                           id="icon1"></i>
                                       <p class="paragraph5">Location</p>
                                       <p class="paragraph6">Datiara West</p>
                                       <p class="paragraph6">Brahmanbaria,Bangladesh</p>
                                   </div>
                                   <div class="col-md-6 col-sm-12 container contact-border p-4">
                                       <i class="fa-solid fa-phone fs-2 mb-2" style="color: var(--custom-primary-color) !important;" id="icon2"></i>
                                       <p class="paragraph5">Call Us</p>
                                       <p class="paragraph6">+8801423659</p>
                                       <p class="paragraph6">+8801425454</p>
                                   </div>

                               </div>
                               <div class="row cus-bg-white">
                                   <div class="col-md-6 col-sm-12 container contact-border p-4">
                                       <i class="fa-regular fa-envelope fs-2 mb-2" style="color: var(--custom-primary-color) !important;"
                                           id="icon3"></i>
                                       <p class="paragraph5">Email Us</p>
                                       <p class="paragraph6">info@gmail.com</p>
                                       <p class="paragraph6">info@gmail.com</p>
                                   </div>
                                   <div class="col-md-6 col-sm-12 container contact-border p-4">
                                       <i class="fa-regular fa-clock fs-2 mb-2" style="color: var(--custom-primary-color) !important;" id="icon4"></i>
                                       <p class="paragraph5">Working Hours</p>
                                       <p class="paragraph6">Mon-Fri 9am to 5pm</p>
                                       <p class="paragraph6">Sunday 9am to 1pm</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6 col-sm-12">
                           <div class="container mt-4">
                               <div class="contact-form">
                                   <div class="mb-3">
                                       <input type="text" name="name" id="" class="form-control"
                                           placeholder="Your Name">
                                   </div>
                               </div>
                               <div class="contact-form">
                                   <div class="mb-3">
                                       <input type="email" name="email" id="" class="form-control"
                                           placeholder="Your Email">
                                   </div>
                               </div>
                               <div class="contact-form">
                                   <div class="mb-3">
                                       <input type="text" name="name" id="" class="form-control" placeholder="Subject">
                                   </div>
                               </div>
                               <div class="contact-form">
                                   <div class="mb-3">
                                       <textarea name="message" class="form-control" placeholder="Message" id=""
                                           cols="30" rows="10"></textarea>
                                   </div>
                                   <div class="mb-3">
                                       <button type="submit"
                                           class="btn cus-bg-primary-color hero_get_started_btn text-light">Send
                                           Message</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </div>






       <!-- contact section starts here -->




   </main>
   <!-- main code section ends here -->



<?php
require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/footer_scripts.php';


?>

