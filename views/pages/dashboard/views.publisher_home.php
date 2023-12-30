<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


    <!-- main code section starts here -->
    <main>
        <div class="my-home-section">
            <div class="container-fluid">
                <div class="row">
                <?php

$active_class_publisher_home = "publisher_home";

                    // $controllers->active_class($active_class);

                    $controllers->dashboard_active_class($active_class_publisher_home);
                    require_once __DIR__ . '/../inc/dashboard_sidebar.php';

                    ?>
                    <div class="col-md-9 col-sm-12">
                        <div class="container">
                            <div class="content-section">
                                <div class="welcome-section fs-2 m-4">
                                    Hi, Protik, welcome back !
                                </div>
                                <div class="info-section">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 cus-dash-bg-violent rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">1000</div>
                                                <div class="info-name">Total Publish</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 cus-bg-primary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">1500</div>
                                                <div class="info-name">UI/UX Design</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 bg-danger rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">1500</div>
                                                <div class="info-name">UI/UX Design</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12 bg-primary rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">1500</div>
                                                <div class="info-name">UI/UX Design</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="activities-section m-auto">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 activities-user cus-activities-bg p-4 mt-4">
                                            <img src="/assets/img/man1.jpg" class="img-fluid activities_img rounded-circle d-flex m-auto" alt="">
                                            <div class="user_name fs-2 text-center mt-4 mb-4">
                                                Protik
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 cus-activities-info-bg mt-4 p-4">
                                            <div class="user_activities_info m-4">
                                                <div class="activities_title fs-2 ">
                                                    Your Activies
                                                </div>
                                                <div class="activities_content fs-5 mt-4">
                                                    <div class="content_box d-flex text-success">
                                                        <div class="section_content me-2 ">
                                                            <i class="fa-solid fa-star"></i>
                                                            Reviews:
                                                        </div>
                                                        <div class="section_content">2</div>
                                                    </div>
                                                    <div class="content_box d-flex text-warning">
                                                        <div class="section_content me-2 ">
                                                            <i class="fa-regular fa-clock"></i>
                                                            Read Time:
                                                        </div>
                                                        <div class="section_content">1</div>
                                                    </div>
                                                    <div class="content_box d-flex text-danger">
                                                        <div class="section_content me-2 ">
                                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                                            Total Donate:
                                                        </div>
                                                        <div class="section_content">3</div>
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
    </main>



<?php
// require_once __DIR__ . '/../inc/footer.php';
require_once __DIR__ . '/../inc/footer_scripts.php';
?>

