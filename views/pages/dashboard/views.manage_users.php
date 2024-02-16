<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

$active_title = "My Team Members";

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();

$controllers->check_verify_email($_SESSION['user_email']);

$controllers->check_user_roles();




?>
<div id="preloader">
    <!-- manage blog row skele view  ma -->
                            <?php

                            // skeleton of the page
                            
                            require __DIR__ . '/skeletons/views.skeleton.team_members.php';

                            ?>
                        </div>



<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_manage_users = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_manage_users);
                require __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    MANAGE USERS
                                </div>

                                <div class="alert_show_section">
                                    <?php
                                    
                                    $controllers->update_user_roles();

                                    ?>
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4">
                                    <div class="container blog_scroll">
                                        <div class="total_item_section m-4 p-4 fs-4">Total Members : 
                                            <?php

                                            $result_team_count = $controllers->show_all("users");

                                            if($result_team_count){
                                                if($result_team_count->num_rows > 0){
                                                    echo $result_team_count->num_rows;
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
                                                        <th>Member Image</th>
                                                        <th>Member Name</th>
                                                        <th>Contribution</th>
                                                        <th>Message Member</th>
                                                        <th>Block The Member</th>
                                                        <th>Set the role of The Member</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php

                                                // $result_team = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY u.user_id ASC");
                                                // $result_team = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY u.user_id ASC");
                                                // $result_team = $controllers->join_show_all("*", "`users` u", "`images` img", "u.user_id = img.user_id");

                                                $result_team = $controllers->show_all("users");
                                                
                                                // $result_team = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY ar.article_id DESC");
                                                
                                                if($result_team){
                                                    if($result_team->num_rows > 0){
                                                        $sl_no = 1;
                                                        
                                                        while($row = $result_team->fetch_assoc()){

                                                            $user_id = $row['user_id'];


                                                            echo '
                                                            
                                                        <tr>
                                                        <td>'.$sl_no.'</td>
                                                        <td>
                                                            <img src="'. $controllers->show_user_image($row['user_img_name']) .'" style="min-height: 50px !important;"  width="50px" class="img-fluid" alt="">
                                                        </td>
                                                        <td>'.$row['user_name'].'</td>
                                                        <td>'?>
                                                        
                                                    
                                                    <?php 

                                                    $result_contibuton = $controllers->show_where("article", "`user_id` = '$user_id'");

                                                    if($result_contibuton){
                                                        if($result_contibuton->num_rows > 0){
                                                            echo $result_contibuton->num_rows;
                                                        }else{
                                                            echo '0';
                                                        }
                                                    }
                                                    
                                                    echo '
                                                    
                                                    </td>
                                                        <td>
                                                        <button class="btn btn-primary text-light hero_get_started_btn">
                                                        <i class="fa-solid fa-envelope"></i>
                                                        </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger text-light hero_get_started_btn">
                                                            <i class="fa-solid fa-flag"></i>

                                                            </button>
                                                        </td>

                                                        <form action="" method="post">
                                                            <td>
                                                                <select name="select_user_roles" id="" class="form-control">'; ?>
                                                                
                                                                    <option value="admin" <?php 
                                                                if($row['user_role'] == 'admin'){
                                                                    echo 'selected';
                                                                } ?> >
                                                                        Team Leader / Admin
                                                                    </option>
                                                                    <option value="chief_programmer" <?php 
                                                                if($row['user_role'] == 'chief_programmer'){
                                                                    echo 'selected';
                                                                } ?> >
                                                                        Chief Programmer
                                                                    </option>
                                                                    <option value="programmer" <?php 
                                                                if($row['user_role'] == 'programmer'){
                                                                    echo 'selected';
                                                                } ?> >
                                                                        Programmer
                                                                    </option>
                                                                    <option value="designer" <?php 
                                                                if($row['user_role'] == 'designer'){
                                                                    echo 'selected';
                                                                } ?>>
                                                                        Designer
                                                                    </option>
                                                                    <option value="content_writer" <?php 
                                                                if($row['user_role'] == 'content_writer'){
                                                                    echo 'selected';
                                                                } ?><?php echo ' >
                                                                        Content Writer
                                                                    </option>
                                                                   
                                                                </select>

                                                                <input type="hidden" name="get_user_id" value="'.$user_id.'">

                                                            </td>
                                                            <td>
                                                                <button type="submit" name="role_update_btn" class="btn btn-dark btn-sm">Update</button>
                                                            </td>
                                                        </form>
                                                        
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
</main>



<?php
// require_once __DIR__ . '/../inc/footer.php';
require_once __DIR__ . '/../inc/footer_scripts.php';
?>