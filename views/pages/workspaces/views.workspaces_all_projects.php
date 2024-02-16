<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

$active_title = "Publisher Home";

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();
// $controllers->workspace_login();
$controllers->workspace_login_check();

$controllers->check_verify_email($_SESSION['user_email']);

$controllers->workspace_permitted_users();


?>

<div id="preloader">
    <?php

    // skeleton of the page

    // require_once __DIR__ . '../../dashboard/skeletons/views.skeleton.add_blog.php';

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

                $active_class_project_hub = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_project_hub);
                include __DIR__ . '/../inc/workspaces_sidebar.php';

                ?>
                <!-- enter add blog nav -->
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    ALL PROJECTS
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4">
                                    <div class="container blog_scroll">
                                        <div class="total_item_section m-4 p-4 fs-4">Total Projects : 
                                            <?php

                                            $result_project_count = $controllers->show_all("projects");

                                            if($result_project_count){
                                                if($result_project_count->num_rows > 0){
                                                    echo $result_project_count->num_rows;
                                                }else{
                                                    echo '0';
                                                }
                                            }

                                            ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Project Image</th>
                                                        <th>Project Title</th>
                                                        <th>Project Description</th>
                                                        <th>Project Status</th>
                                                        <th>Action</th>
                                                        <!-- <th>Message Member</th> -->
                                                        <!-- <th>Report The Member</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php

                                                // $result_projects = $controllers->show_all("projects", "`projects`.`project_id` DESC");

                                                // $result_projects = $controllers->join_show_all("*", "`users` u", "`images` img", "u.user_id = img.user_id");



                                                // $result_team = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY u.user_id ASC");
                                                $result_projects = $controllers->join_2_show_all("*", "`projects` pr", "`images` img", "pr.image_id = img.image_id", "`users` u", "u.user_id = pr.user_id", "ORDER BY pr.project_id DESC");
                                                // $result_team = $controllers->join_show_all("*", "`users` u", "`images` img", "u.user_id = img.user_id");

                                                // $result_projects = $controllers->show_all("projects");
                                                
                                                // $result_team = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY ar.article_id DESC");
                                                
                                                if($result_projects){
                                                    if($result_projects->num_rows > 0){

                                                        $sl_no = 1;

                                                        while($row = $result_projects->fetch_assoc()){

                                                            $user_id = $row['user_id'];


                                                            echo '
                                                            
                                                        <tr>
                                                        <td>'. $sl_no .'</td>
                                                        <td>
                                                            <img src="/assets/uploads/workspaces/img/'.$row['image_name'].'" style="min-height: 50px !important;"  width="70px" class="img-fluid" alt="">
                                                        </td>
                                                        <td>'.$row['project_title'].'</td>
                                                        <td>'?>
                                                        
                                                    
                                                    <?php 

                                                    $result_contibuton = $controllers->show_where("projects", "`user_id` = '$user_id'");

                                                    if($result_contibuton){
                                                        if($result_contibuton->num_rows > 0){
                                                            echo $result_contibuton->num_rows;
                                                        }else{
                                                            echo '0';
                                                        }
                                                    }
                                                    
                                                    echo '
                                                    
                                                    </td>
                                                        <td class="">
                                                        
                                                        '.$row['project_status'].'
                                                        
                                                        </td>
                                                        <td>
                                                        <button class="btn btn-primary text-light hero_get_started_btn">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        </button>
                                                        </td>
                                                      
                                                        
                                                    </tr>
                                                            
                                                            ';
                                                            $sl_no++;
                                                        }
                                                    }
                                                }

                                                ?>


                                                    
                                                    
                                                    
                                                </tbody>
                                            </table>
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