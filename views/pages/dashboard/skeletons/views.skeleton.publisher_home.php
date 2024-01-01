<?php

require_once __DIR__ . '/../../../../config/conn.php';
require_once __DIR__ . '/../../../../models/models.php';
require_once __DIR__ . '/../../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


    <!-- main code section starts here -->
    <div>
        <div class="my-home-section">
            <div class="container-fluid">
                <div class="row">
                <?php

$active_class_publisher_home = "active_class";

                    // $controllers->active_class($active_class);

                    $controllers->dashboard_active_class($active_class_publisher_home);
                    include_once __DIR__ . '/../../inc/dashboard_sidebar.php';

                    ?>
                    <div class="col-md-9 col-sm-12">
                        <div class="container">
                            <div class="content-section">
                                <div class="welcome-section cus-bg-light-secondary-color h-25 fs-2 m-4">
                                    
                                </div>
                                <div class="info-section">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 cus-bg-light-secondary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count"></div>
                                                <div class="info-name"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 cus-bg-light-secondary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count"></div>
                                                <div class="info-name"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 cus-bg-light-secondary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count"></div>
                                                <div class="info-name"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12 cus-bg-light-secondary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count"></div>
                                                <div class="info-name"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="activities-section m-auto">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 activities-user cus-bg-light-secondary-color p-4 mt-4">
                                            <img src="" class="img-fluid bg-light activities_img rounded-circle d-flex m-auto" alt="">
                                            <div class="user_name fs-2 text-center bg-light w-100 h-25 mt-4 mb-4">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12  cus-bg-light-secondary-color mt-4 p-4">
                                            <div class="user_activities_info m-4">
                                                <div class="activities_title fs-2 cus-bg-white h-25">
                                                    
                                                </div>
                                                <div class="activities_content fs-5 mt-4">
                                                    <div class="content_box cus-bg-white d-flex text-success mb-4">
                                                        <div class="section_content me-2 ">
                                                            
                                                           
                                                        </div>
                                                        <div class="section_content"></div>
                                                    </div>
                                                    <div class="content_box cus-bg-white d-flex text-warning mb-4">
                                                        <div class="section_content me-2 ">
                                                            
                                                            
                                                        </div>
                                                        <div class="section_content"></div>
                                                    </div>
                                                    <div class="content_box cus-bg-white d-flex text-danger">
                                                        <div class="section_content me-2 ">
                                                            
                                                            
                                                        </div>
                                                        <div class="section_content"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



<?php
// require_once __DIR__ . '/../inc/footer.php';
// require_once __DIR__ . '/../../inc/footer_scripts.php';
?>

