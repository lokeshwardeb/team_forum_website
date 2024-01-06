<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

$active_title = "Update Blog";

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();

$controllers->check_verify_email($_SESSION['user_email']);




?>


<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

                $active_class_manage_items = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_manage_items);
                require __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    UPDATE BLOGS
                                </div>

                                <div class="alert_section">
                                    <?php

                                    $blog_id = $controllers->pure_data($_GET['blog_sl_no']);

                                    if (!isset($_GET['blog_sl_no'])) {
                                        // header('Location: /manage_blog');
                                        echo '
                                        
                                        <script>
                                        window.location.href = "/manage_blog"
                                        </script>
                                        
                                        ';
                                    }

                                    $controllers->update_blog();


                                    $result_update_show = $controllers->show_where("article", "`article_id` = '$blog_id'");

                                    if ($result_update_show) {
                                        if ($result_update_show->num_rows == 1) {
                                            while ($row = $result_update_show->fetch_assoc()) {
                                                $show_title = $row['title'];
                                                $show_sub_title = $row['sub_title'];
                                                $show_article = $row['description'];
                                                $show_catagory_id = $row['catagory_id'];
                                            }
                                        } else {
                                            $show_title = '';
                                            $show_sub_title = '';
                                            $show_article = '';
                                            $show_catagory_id = '';
                                        }
                                    }

                                    ?>
                                </div>

                                <div class="form-section container cus-bg-light-secondary-color mt-4">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="title" class="fw-bold m-2">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="<?php echo $show_title ?>">


                                                    <input type="hidden" name="blog_id" id="title" class="form-control" placeholder="Enter Title" value="<?php echo $blog_id ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="catagory" class="fw-bold m-2">Catagory</label>
                                                    <select name="catagory" class="form-control" id="">
                                                        <option value="">Select Catagory</option>

                                                        <?php

                                                        $result_catagory = $controllers->show_all("catagory");

                                                        if ($result_catagory) {
                                                            if ($result_catagory->num_rows) {
                                                                while ($row = $result_catagory->fetch_assoc()) {
                                                                    echo '
                                                              
                                                                <option value="'.$row['catagory_id'].'"' ?><?php

                                                                        if ($row['catagory_id'] == $show_catagory_id) {
                                                                            echo 'selected';
                                                                        }

                                                                        ?><?php
                                                                    echo
                                                                    '
                                                                >' . $row['catagory_name'] . '</option>
                                                                ';
                                                                }
                                                            }
                                                        }



                                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2">Sub Title</label>
                                                    <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Enter Title" value="<?php echo $show_sub_title ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2">Article</label>
                                                    <textarea name="article" id="article" class="form-control" placeholder="Write your article" cols="30" rows="10"><?php echo $controllers->pure_data($show_article);   ?></textarea>
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
                                                    <button type="submit" class="btn cus-bg-primary-color text-white hero_get_started_btn mb-4" name="update_blog_btn">Update Blog</button>
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