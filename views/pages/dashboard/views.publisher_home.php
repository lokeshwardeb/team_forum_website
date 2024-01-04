<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();



?>

<div id="preloader">
                            <?php

                            // skeleton of the page
                            
                            require_once __DIR__ . '/skeletons/views.skeleton.publisher_home.php';

                            ?>
                        </div>

    <!-- main code section starts here -->
    <main>
        <div class="my-home-section">
            <div class="container-fluid">
                <div class="row">
                <?php

$active_class_publisher_home = "active_class";

                    // $controllers->active_class($active_class);

                    ?>

                    
                    
                    

<?php                    

                    // main contents of the page

                    $controllers->dashboard_active_class($active_class_publisher_home);
                    include __DIR__ . '/../inc/dashboard_sidebar.php';

                    ?>
                    <div class="col-md-9 col-sm-12">
                        <div class="container">
                            <div class="content-section">
                                <div class="welcome-section fs-2 m-4">
                                    Hi, <?php
                                    
                                    echo $_SESSION['username'];
                                    
                                    
                                    ?>, welcome back !
                                </div>
                                <div class="info-section">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 cus-dash-bg-violent rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">
                                                    <?php

                                                    $result = $controllers->show_all("article");

                                                    if($result){
                                                        if($result->num_rows > 0){
                                                            echo $result->num_rows;
                                                        }else{
                                                            echo '0';
                                                        }
                                                    }

                                                    ?>
                                                </div>
                                                <div class="info-name">Total Publish</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 cus-bg-primary-color rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">
                                                    <?php

                                                    $result_ui_ux = $controllers->join_show_all("a.article_id, a.title, a.sub_title, a.description, c.catagory_id, c.catagory_name", "`article` a", "`catagory` c", "a.catagory_id = c.catagory_id", "", "c.catagory_name = 'UI/UX DESIGN'");

                                                    if($result_ui_ux){
                                                        if($result_ui_ux->num_rows > 0){
                                                            echo $result_ui_ux->num_rows;
                                                        }else{
                                                            echo '0';
                                                        }
                                                    }

                                                    ?>
                                                </div>
                                                <div class="info-name">UI/UX Design</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 bg-danger rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">
                                                <?php

                                                $result_ui_ux = $controllers->join_show_all("a.article_id, a.title, a.sub_title, a.description, c.catagory_id, c.catagory_name", "`article` a", "`catagory` c", "a.catagory_id = c.catagory_id", "", "c.catagory_name = 'FRONTEND DEVELOPER'");

                                                if($result_ui_ux){
                                                    if($result_ui_ux->num_rows > 0){
                                                        echo $result_ui_ux->num_rows;
                                                    }else{
                                                        echo '0';
                                                    }
                                                }

                                                ?>
                                                </div>
                                                <div class="info-name">Frontend Developer</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-12 bg-primary rounded-4 mt-4 border border-5 border-light">
                                            <div class="info-content p-4 text-center fs-4 text-light ">
                                                <div class="info-count">
                                                <?php

                                                $result_ui_ux = $controllers->join_show_all("a.article_id, a.title, a.sub_title, a.description, c.catagory_id, c.catagory_name", "`article` a", "`catagory` c", "a.catagory_id = c.catagory_id", "", "c.catagory_name = 'BACKEND DEVELOPER'");

                                                if($result_ui_ux){
                                                    if($result_ui_ux->num_rows > 0){
                                                        echo $result_ui_ux->num_rows;
                                                    }else{
                                                        echo '0';
                                                    }
                                                }

                                                ?>
                                                </div>
                                                <div class="info-name">Backend Developer</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="activities-section m-auto">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 activities-user cus-activities-bg p-4 mt-4">

                                        <?php

                                        if(isset($_SESSION['user_img_name'])){
                                            if($_SESSION['user_img_name'] != ''){
                                                echo '
                                                
                                                <img src="/assets/uploads/users_img/' . $_SESSION['user_img_name'] . '" class="img-fluid activities_img rounded-circle d-flex m-auto" alt="">
                                                
                                                ';
                                            }else{
                                                echo '
                                                <img src="/assets/img/man1.jpg" class="img-fluid activities_img rounded-circle d-flex m-auto" alt="">
                                                
                                                ';
                                            }
                                        }

                                        ?>


                                            


                                            <div class="user_name fs-2 text-center mt-4 mb-4">
                                                <?php 
                                                
                                                echo $_SESSION['username'];
                                                
                                                
                                                ?>
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

