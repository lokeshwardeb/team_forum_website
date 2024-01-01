<?php

require_once __DIR__ . '/../../../../config/conn.php';
require_once __DIR__ . '/../../../../models/models.php';
require_once __DIR__ . '/../../../../controllers/controllers.php';


$controllers = new Controllers;



require_once __DIR__ . '/../../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';



?>


<!-- main code section starts here -->
<div>
    <div class="my-home-section">
        <div class="container-fluid">
            <div class="row">
                <?php

$active_class_manage_items = "active_class";

                // $controllers->active_class($active_class);

                $controllers->dashboard_active_class($active_class_manage_items);
                include __DIR__ . '/../../inc/dashboard_sidebar.php';

                ?>
                <div class="col-md-9 col-sm-12 mb-4">
                    <div class="container">
                        <div class="content-section">
                            <div class="add_blog_section  ">
                                <div class="container blog_section_title fs-2 m-auto justify-content-center d-flex mt-4 pb-2 border-1 border-bottom border-dark cus-bg-light-secondary-color">
                                    
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4 pt-2">
                                    <div class="container mt-4">
                                        <div class="total_item_section cus-bg-white m-4 p-4 "></div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-hover">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>Sl</th>
                                                        <th>Item Image</th>
                                                        <th>Item Name</th>
                                                        <th>View</th>
                                                        <th>Update</th>
                                                        <th>Delete</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td>
                                                            
                                                        </td>
                                           
                                                        
                                                    </tr>
                                             
                                                    <tr class="">
                                                        <div class="cus-bg-white mt-4 mb-4" style="min-height: 5vh;"></div>
                                           
                                                        
                                                    </tr>
                                             
                                                    <tr class="">
                                                        <div class="cus-bg-white mt-4 mb-4" style="min-height: 5vh;"></div>
                                           
                                                        
                                                    </tr>
                                             
                                                    <tr class="">
                                                        <div class="cus-bg-white mt-4 mb-4" style="min-height: 5vh;"></div>
                                           
                                                        
                                                    </tr>
                                                    <tr class="">
                                                        <div class="cus-bg-white mt-4 mb-4" style="min-height: 5vh;"></div>
                                           
                                                        
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
</div>



<?php
// require_once __DIR__ . '/../inc/footer.php';
// require_once __DIR__ . '/../inc/footer_scripts.php';
?>