 <!-- catagory section starts here -->

 <div class="container">
     <div class="catagory-section">
         <div class="row">
             <div class="col-md-4 col-sm-12  catagory-navbar mt-4  text-light">
                 <div class="catagory-section-title pt-4 fs-1  rounded-4 text-center cus-bg-primary-color mt-4 mb-4">
                     Catagories
                 </div>

                 <div class="catagory-section-links  cus-bg-light-secondary-color text-dark">
                     <?php

                        require_once __DIR__ . '/catagory_navbar.php';

                     ?>
                 </div>

             </div>
             <div class="col-md-8 col-sm-12">
                 <?php

                    require_once __DIR__ . '/blog_post.php';

                 ?>
             </div>
         </div>
     </div>
 </div>


 <!-- catagory section starts here -->