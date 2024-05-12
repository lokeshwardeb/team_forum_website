<?php
require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new Controllers;

$user_name = $_SESSION['username'];



?>




<div class="col-md-3 col-sm-12 navbar-expand-md cus-bg-primary-color ">
                        <nav class="navbar d-block p-4">

                            <a class="navbar-brand " href="#">
                                <div id="" class="d-flex logo-section rounded fs-4">
                                    <div class="logo_part_1 ps-2 fw-bold bg-light cus-primary-color">D</div>
                                    <div class="logo_part_2 pe-2 bg-light">ahuk Forum</div>
                                </div>
                            </a>
                            <button class="navbar-toggler mt-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">




                                <ul class="fs-5 mt-4 dashboard-navbar">
                                    <li class="list-group   mb-4">
                                        <a href="/publisher_home" class="nav-link dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_publisher_home) ?> ">
                                            <i class="fa-solid fa-house"></i>
                                            Publisher Home
                                        </a>
                                    </li>
                                    <li class="list-group mb-4 dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_add_blog) ?>">
                                        <a href="/add_blog" class="nav-link ">
                                            <i class="fa-solid fa-square-plus"></i>
                                            Add Blog
                                        </a>
                                    </li>
                                    <li class="list-group mb-4 dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_manage_items) ?>">
                                        <a href="/manage_blog" class="nav-link ">
                                            <i class="fa-solid fa-list-check"></i>
                                            Manage Blogs
                                        </a>
                                    </li>
                                    <li class="list-group dashboard-hover-link p-2 rounded mb-4 <?php echo $controllers->dashboard_active_class($active_class_my_all_blogs) ?>">
                                        <a href="/my_all_blogs" class="nav-link ">
                                            <i class="fa-regular fa-newspaper"></i>
                                           My All Blogs
                                        </a>
                                    </li>
                                    <div class="border border-light"></div>

                                    <?php

                                    // this below commented code section in php is for the workspace section but it is now commented because it has been removed temporary until the next decission. It is expected that there will be a new software with the features of the workspaces and for the project management. The new project management software will be created with the workspaces features


                                    ?>
                                 
                                    <!-- <?php

                                    $result_workspace_show = $controllers->show_where("users", "`user_role` = 'chief_programmer' and `user_name` = '$user_name' or `user_role` = 'admin' and `user_name` = '$user_name' or `user_role` = 'programmer' and `user_name` = '$user_name' or `user_role` = 'designer' and `user_name` = '$user_name'");

                                    if($result_workspace_show){
                                        if($result_workspace_show->num_rows == 1){
                                            echo '
                                            
                                            <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_team_workspaces) ?>">
                                            <a href="/workspaces_dashboard" target="_blank" class="nav-link ">
                                            <i class="fa-solid fa-briefcase"></i>
                                                Workspaces
                                            </a>
                                        </li>
                                            
                                            ';
                                        }
                                    }




                                    ?> -->
                                    

                                    
                                    <?php

$user_name = $_SESSION['username'];

$result_user_role =  $controllers->show_where("users", "`user_role` = 'chief_programmer' and `user_name` = '$user_name' or `user_role` = 'admin' and `user_name` = '$user_name'");

if($result_user_role){
    if($result_user_role->num_rows == 1){
        // that means the the user is not exists and the user is not permitted to enter the section and to manage and control

        echo '
        <li class="list-group dashboard-hover-link p-2 mt-4 rounded ';?>
        <?php 
        $controllers->dashboard_active_class($active_class_manage_users)
        ?><?php echo '">
        <a href="/manage_users" class="nav-link ">
        <i class="fa-solid fa-people-roof"></i>
            Manage Users
        </a>
    </li>
        ';

    }else{
        // $active_class_manage_users ='';
    }
}



                                    ?>


                                 
                                    <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_team_members_section) ?>">
                                        <a href="/my_team_members" class="nav-link ">
                                        <i class="fa-solid fa-people-group"></i>
                                            My Team Members
                                        </a>
                                    </li>
                                    <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_settings) ?>">
                                        <a href="/settings" class="nav-link ">
                                        <i class="fa-solid fa-gear"></i>
                                            Settings
                                        </a>
                                    </li>
                                  
                                    <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_view_post) ?>">
                                        <a href="/home" target="_blank" class="nav-link ">
                                        <i class="fa-solid fa-book-open"></i>
                                            View Post
                                        </a>
                                    </li>

                                    <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_logout) ?>">
                                        <a href="/logout" class="nav-link ">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </nav>
                    </div>