<?php

require_once __DIR__ . '/../../../../config/conn.php';
require_once __DIR__ . '/../../../../models/models.php';
require_once __DIR__ . '/../../../../controllers/controllers.php';


$controllers = new Controllers;



require_once __DIR__ . '/../../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_my_all_blogs = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_my_all_blogs);
                require_once __DIR__ . '/../../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark cus-bg-light-secondary-color">
                                    
                                </div>

                                <div class="manage-section p-4 container cus-bg-light-secondary-color mt-4" style="min-height: 15vh;">
                                   <div class="container ">

                                   <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="title_div" style="background-color: white !important; min-height: 5vh; "></div>
                                    </div>
                                    <div class="col-md-4 col-sm-12" style="background-color: white !important; min-height: 5vh; "></div>
                                    <div class="col-md-12 mt-4 col-sm-12" style="background-color: white !important; min-height: 10vh; "></div>
                                   </div>
                                    <?php

                                    // require_once __DIR__ . '/../../inc/blog_post.php';

                                    ?>
                                   </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
// require_once __DIR__ . '/../inc/footer.php';
// require_once __DIR__ . '/../inc/footer_scripts.php';
?>