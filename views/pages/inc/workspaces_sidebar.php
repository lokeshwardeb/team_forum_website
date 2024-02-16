<?php
require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new Controllers;

$user_name = $_SESSION['username'];



?>




<div class="col-md-3 col-sm-12 navbar-expand-md cus-bg-primary-color " style="background-color: var(--bs-primary-border-subtle) !important;">
    <nav class="navbar d-block p-4">

        <a class="navbar-brand " href="#">
            <div id="" class="d-flex logo-section rounded fs-4">
                <div class="logo_part_1 ps-2 fw-bold bg-light cus-primary-color">D</div>
                <div class="logo_part_2 pe-2 bg-light">ahuk Forum</div>
            </div>
        </a>
        <button class="navbar-toggler mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">




            <ul class="fs-5 mt-4 dashboard-navbar">
                <li class="list-group   mb-4">
                    <a href="/workspaces_dashboard" class="nav-link active dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_workspace_dashboard) ?> ">
                        <i class="fa-solid fa-house"></i>
                        Workspaces Dashboard
                    </a>
                </li>

                <p class="d-inline-flex gap-1 ">
                    <!-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a> -->
                    <button class="btn dashboard-hover-link  fs-5  <?php echo $controllers->dashboard_active_class($active_class_project_hub) ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-medal"></i>
                        Projects Hub
                    </button>
                </p>
                <div class="collapse " id="collapseExample">
                    <div class="card card-body ">

                        <li class="list-group mt-4 mb-4 dashboard-hover-link p-2 rounded ">
                            <a href="/create_new_project" class="nav-link ">
                                <i class="fa-solid fa-list-check"></i>
                                Create a new project
                            </a>
                        </li>
                        <li class="list-group dashboard-hover-link p-2 rounded mb-4 ">
                            <a href="/workspaces_all_projects" class="nav-link ">
                                <i class="fa-regular fa-newspaper"></i>
                                View all the projects
                            </a>
                        </li>
                    </div>
                </div>


                <p class="d-inline-flex gap-1">
                    <!-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a> -->
                    <button class="btn dashboard-hover-link  fs-5" style="font-size: 18px !important;" type="button" data-bs-toggle="collapse" data-bs-target="#documentation_btn" aria-expanded="false" aria-controls="documentation_btn">
                    <!-- <i class="fa-solid fa-book"></i> -->
                    <i class="fa-regular fa-file-word"></i>
                    <!-- <i class="fa-solid fa-file-word"></i> -->
                        Documentation Repository
                    </button>
                </p>
                <div class="collapse " id="documentation_btn">
                    <div class="card card-body ">

                        <li class="list-group mt-4 mb-4 dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_manage_items) ?>">
                            <a href="/create_new_project" class="nav-link ">
                                <i class="fa-solid fa-list-check"></i>
                                Create a new project
                            </a>
                        </li>
                        <li class="list-group dashboard-hover-link p-2 rounded mb-4 <?php echo $controllers->dashboard_active_class($active_class_my_all_blogs) ?>">
                            <a href="/workspaces_all_projects" class="nav-link ">
                                <i class="fa-regular fa-newspaper"></i>
                                View all the projects
                            </a>
                        </li>
                    </div>
                </div>


                <!-- <li class="list-group  mb-4 dashboard-hover-link p-2 rounded <?php echo $controllers->dashboard_active_class($active_class_add_blog) ?>">
                    <a href="" class="nav-link ">
                        <i class="fa-solid fa-square-plus"></i>
                        Projects Hub
                    </a>
                </li> -->
                <div class="border border-light"></div>

                <div class="border border-light"></div>

                <?php

                $result_workspace_show = $controllers->show_where("users", "`user_role` = 'chief_programmer' and `user_name` = '$user_name' or `user_role` = 'admin' and `user_name` = '$user_name' or `user_role` = 'programmer' and `user_name` = '$user_name' or `user_role` = 'designer' and `user_name` = '$user_name'");

                if ($result_workspace_show) {
                    if ($result_workspace_show->num_rows == 1) {
                        echo '
                                            
                                            <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_team_workspaces) ?>">
                                            <a href="/team_workspaces" target="_blank" class="nav-link ">
                                            <i class="fa-solid fa-briefcase"></i>
                                                Workspaces
                                            </a>
                                        </li>
                                            
                                            ';
                    }
                }




                ?>



                <?php

                $user_name = $_SESSION['username'];

                $result_user_role =  $controllers->show_where("users", "`user_role` = 'chief_programmer' and `user_name` = '$user_name' or `user_role` = 'admin' and `user_name` = '$user_name'");

                if ($result_user_role) {
                    if ($result_user_role->num_rows == 1) {
                        // that means the the user is not exists and the user is not permitted to enter the section and to manage and control

                        echo '
        <li class="list-group dashboard-hover-link p-2 mt-4 rounded '; ?>
                        <?php
                        $controllers->dashboard_active_class($active_class_manage_users)
                        ?><?php echo '">
        <a href="/manage_users" class="nav-link ">
        <i class="fa-solid fa-people-roof"></i>
            Manage Users
        </a>
    </li>
        ';
                        } else {
                            // $active_class_manage_users ='';
                        }
                    }



                            ?>

<li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_team_members_section) ?>">
                            <a href="/publisher_home" target="_blank" class="nav-link ">
                                <i class="fa-solid fa-people-group"></i>
                                Go back to publisher home
                            </a>
                        </li>



                        <!-- <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_team_members_section) ?>">
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
                        </li> -->
            </ul>
        </div>


    </nav>
</div>