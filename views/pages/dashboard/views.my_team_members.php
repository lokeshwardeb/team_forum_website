<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


<!-- main code section starts here -->
<main>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_team_members = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_team_members);
                require_once __DIR__ . '/../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark">
                                    MY TEAM MEMBERS
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4">
                                    <div class="container">
                                        <div class="total_item_section m-4 p-4 fs-4">Total Items : 4</div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Member Image</th>
                                                        <th>Member Name</th>
                                                        <th>Contribution</th>
                                                        <th>Message Member</th>
                                                        <th>Report The Member</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <img src="/assets/img/company_table_look.jpg" width="50px" class="img-fluid" alt="">
                                                        </td>
                                                        <td>Protik</td>
                                                        <td>20</td>
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
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                        <img src="/assets/img/artical_book.jpg" width="50px" class="img-fluid" alt="">

                                                        </td>
                                                        <td>Amit</td>
                                                        <td>20</td>
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
                                                        
                                                    </tr>
                                                    
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