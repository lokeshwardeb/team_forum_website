<?php

require_once __DIR__ . '/../../../../config/conn.php';
require_once __DIR__ . '/../../../../models/models.php';
require_once __DIR__ . '/../../../../controllers/controllers.php';


$controllers = new Controllers;



require_once __DIR__ . '/../../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


<!-- skeleton code section starts here -->
<div>
    <div class="add_blog">
        <div class="container-fluid">
            <div class="row">
            <?php

$active_class_publisher_home = "active_class";

                    // $controllers->active_class($active_class);

                    $controllers->dashboard_active_class($active_class_publisher_home);
                    include __DIR__ . '/../../inc/dashboard_sidebar.php';

                    ?>
                <div class="col-md-9 col-sm-12">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    ADD NEW BLOGS
                                </div>

                                <div class="form-section container cus-bg-light-secondary-color mt-4">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="title" class="fw-bold m-2"></label>
                                                    <input type="text" name="title" id="title" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="catagory" class="fw-bold m-2"></label>
                                                    <select name="catagory" class="form-control" id="">
                                                        <option value="Catagory"></option>
                                                        <option value="FRONT-END DEVELOPMENT"></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2"></label>
                                                    <input type="text" name="sub_title" id="sub_title" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2"></label>
                                                    <textarea name="article" id="article" class="form-control"  cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <button type="submit" name="add_new_blog" class="btn cus-bg-primary-color text-white hero_get_started_btn mb-4">Add Blog</button>
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
</div>

<!-- skeleton code section ends here -->

<?php
// require_once __DIR__ . '/../inc/footer.php';
// require_once __DIR__ . '/../inc/footer_scripts.php';
?>