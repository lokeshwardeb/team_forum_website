<?php

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';


$controllers = new Controllers;

require_once __DIR__ . '/../inc/header.php';
// require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();



?>

<div id="preloader">
    <!-- manage blog row skele view  ma -->
                            <?php

                            // skeleton of the page
                            
                            require __DIR__ . '/skeletons/views.skeleton.manage_blog.php';

                            ?>
                        </div>


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
                                    MANAGE BLOGS
                                </div>

                                <div class="manage-section container cus-bg-light-secondary-color mt-4">
                                    <div class="container">
                                        <div class="total_item_section m-4 p-4 fs-4">Total Items : 
                                            <?php

                                            $user_id = $_SESSION['user_id'];

                                            $result_total = $controllers->show_where("article", "`user_id` = '$user_id'");

                                            if($result_total){
                                                if($result_total->num_rows > 0){
                                                    echo $result_total->num_rows;
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
                                                        <th>Item Image</th>
                                                        <th>Item Name</th>
                                                        <th>View</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php

                                                  $user_id = $_SESSION['user_id'];

                                                  $result_article = $controllers->show_where("article", "`user_id` = '$user_id'");

                                                  if($result_article){
                                                    if($result_article->num_rows > 0){
                                                        $sl_no = 1;
                                                        while($row = $result_article->fetch_assoc()){
                                                            echo '  
                                                                    <tr>
                                                                    <td>'. $sl_no .'</td>
                                                                    <td>
                                                                        <img src="/assets/img/company_table_look.jpg" width="50px" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>'.$row['title'].'</td>
                                                                    <td>20</td>
                                                                    <td>
                                                                    <a href="/update_blog?blog_sl_no='.$row['article_id'].'">
                                                                        <button class="btn cus-bg-primary-color text-light hero_get_started_btn">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                            </button>
                                                                    </a>
                                                                    </td>
                                                                    <td>
                                                                    <a href="/update_blog" class="nav-link">
                                                                        <button class="btn btn-danger text-light hero_get_started_btn">
                                                                            <i class="fa-solid fa-trash"></i>

                                                                        </button>
                                                                        </a>
                                                                    </td>
                                                                    
                                                                </tr>';

                                                                $sl_no++;
                                                        }
                                                    }else{
                                                        echo '
                                                        <script>
                                                        danger_alert("Sorry, you have not published any blogs yet !", "Please publish a blog. If you are facing the same problem after publishing the blogs then contact the developer !!");
                                                        </script>
                                                        ';
                                                    }
                                                  }

                                                  

                                                  ?>
                                                    <!-- <tr>
                                                        <td>1</td>
                                                        <td>
                                                        <img src="/assets/img/artical_book.jpg" width="50px" class="img-fluid" alt="">

                                                        </td>
                                                        <td>UI/UX Design</td>
                                                        <td>20</td>
                                                        <td>
                                                        <button class="btn cus-bg-primary-color text-light hero_get_started_btn">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger text-light hero_get_started_btn">
                                                                <i class="fa-solid fa-trash"></i>

                                                            </button>
                                                        </td>
                                                        
                                                    </tr> -->
                                                    
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