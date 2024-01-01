<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>
<div id="preloader">
    <!-- manage blog row skele view  ma -->
                            <?php

                            // skeleton of the page
                            
                            require __DIR__ . '/skeletons/views.skeleton.my_all_blogs.php';

                            ?>
                        </div>


<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_my_all_blogs = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_my_all_blogs);
                require __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    MY BLOGS
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4">
                                   <div class="container">
                                    <?php

                                    require_once __DIR__ . '/../inc/blog_post.php';

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
require_once __DIR__ . '/../inc/footer_scripts.php';
?>