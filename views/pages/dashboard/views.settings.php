<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

$active_title = "Settings";

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();

// $controllers->check_verify_email($_SESSION['user_email']);




?>


<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_settings = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_settings);
                require __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    SETTINGS
                                </div>

                                <div class="alert_section">
                                    <?php

                                    $user_id = $_SESSION['user_id'];



                                    $controllers->update_settings();


                                    $result_update_show = $controllers->show_where("users", "`user_id` = '$user_id'");

                                    if ($result_update_show) {
                                        if ($result_update_show->num_rows > 0) {
                                            while ($row = $result_update_show->fetch_assoc()) {
                                                $show_user_name = $row['user_name'];
                                                $show_email = $row['email'];
                                                
                                            }
                                        } else {
                                            $show_name = '';
                                            $show_email = '';
                                           
                                        }
                                    }

                                    ?>
                                </div>

                                <div class="form-section container cus-bg-light-secondary-color mt-4">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="user_name" class="fw-bold m-2">Name</label>
                                                    <input type="text" name="user_name" id="title" class="form-control" placeholder="Your Name" value="<?php echo $show_user_name ?>">


                                                    <input type="hidden" name="user_id" id="" class="form-control" placeholder="Enter Title" value="<?php echo $user_id ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="email" class="fw-bold m-2">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email" value="<?php echo $show_email ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-4">
                                                <div class="mb-3">
                                                    <label for="img" class="fw-bold m-2">Choose Image</label>
                                                    <input type="file" name="img" id="img" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn cus-bg-primary-color text-white hero_get_started_btn mb-4" name="update_settings_btn">Update Settings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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