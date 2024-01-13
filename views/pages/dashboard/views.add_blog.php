<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

$active_title = "Add New Blog";

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();

$controllers->check_verify_email($_SESSION['user_email']);




?>
<div id="preloader">
                            <?php

                            // skeleton of the page
                            
                            require_once __DIR__ . '/skeletons/views.skeleton.add_blog.php';

                            ?>
                        </div>


<!-- main code section starts here -->
<main>
    <div class="add_blog">
        <div class="container-fluid">
            <div class="row">

<!-- enter add blog nav -->
                <?php

                // main contents of the website

                $active_class_add_blog = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_add_blog);
                include __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <!-- enter add blog nav -->
                <div class="col-md-9 col-sm-12">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    ADD NEW BLOGS
                                </div>

                                <div class="form-section container cus-bg-light-secondary-color mt-4">
                                    <div class="disply_section">
                                        <?php

                                        $controllers->add_new_blog();

                                        ?>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="title" class="fw-bold m-2">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="catagory" class="fw-bold m-2">Catagory *</label>
                                                    <select name="catagory" class="form-control" id="" required>
                                                        <option value="">Select Catagory</option>
                                                        <?php

                                                        $result = $controllers->show_all("catagory");
                                                        // $result = $controllers->show_where("catagory", "`catagory_name` = 'UI/UX DESIGN'");

                                                        if($result){
                                                            if($result->num_rows > 0){
                                                                while($row = $result->fetch_assoc()){
                                                                    echo '<option value="'. $row['catagory_id'] .'">'. $row['catagory_name'] .'</option>';                                                                }
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2">Sub Title</label>
                                                    <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Enter Sub Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="sub_title" class="fw-bold m-2">Article</label>
                                                    <textarea name="add_article_content" id="article" class="form-control" placeholder="Write your article" cols="30" rows="10" style="min-height: 500px !important;" required></textarea>
                                                    <!-- <div class="alert_note_section text-danger mt-4 mb-4">
                                                        Note :
                                                        <ul>
                                                        <li>On the artical area when you are writing any article you can add a enter using <b>Enter key</b> on you keyboard and update or save the post. It will be detected by the program automatically</li>
                                                        <li>If you see <b>\r\n</b> on your article area after updating it or before updating it then just don't be panicked. It is just a structure of the program to kept the layout and processing further. You can feel free while updating your article. But keep in mind that you have not delete the <b>\r\n </b>. It may be the cause of the disturbanse of your article structure. </li>
                                                        <li>In example : Form:\r\nGreat UI/UX design isnot just about making things pretty; on this line the \r\n mean the structure and the line break or counts of the enter systems by the program</li>
                                                        <li>If you have any kinds of questions please feel free to ask the question</li>
                                                        </ul>
                                                    </div> -->
                                                    <!-- <div class="alert_note_section text-danger mt-4 mb-4">
                                                        Note :
                                                        <ul>
                                                        <li>If you want to make center of your image try to </li>
                                                        </ul>
                                                    </div> -->

                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-4">
                                                <div class="mb-3">
                                                    <label for="img" class="fw-bold m-2">Choose Image</label>
                                                   <input type="file" name="img" id="img" class="form-control" >
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
</main>

<script>
    var editor =  CKEDITOR.replace( 'add_article_content' );
CKFinder.setupCKEditor( editor );
</script>



<?php
// require_once __DIR__ . '/../inc/footer.php';
include __DIR__ . '/../inc/footer_scripts.php';
?>