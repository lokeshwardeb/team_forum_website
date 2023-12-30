<?php
require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new Controllers;



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
                                        <a href="" class="nav-link ">
                                            <i class="fa-solid fa-list-check"></i>
                                            Manage Items
                                        </a>
                                    </li>
                                    <li class="list-group dashboard-hover-link p-2 rounded mb-4 <?php echo $controllers->dashboard_active_class($active_class_all_blogs) ?>">
                                        <a href="" class="nav-link ">
                                            <i class="fa-regular fa-newspaper"></i>
                                            All Blogs
                                        </a>
                                    </li>
                                    <div class="border border-light"></div>
                                    <li class="list-group dashboard-hover-link p-2 mt-4 rounded <?php echo $controllers->dashboard_active_class($active_class_view_post) ?>">
                                        <a href="/home" target="_blank" class="nav-link ">
                                            <i class="fa-regular fa-newspaper"></i>
                                            View post
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </nav>
                    </div>