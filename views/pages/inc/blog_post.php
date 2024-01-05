<div class="container blog_scroll mt-4 mb-4 pt-4">
    <?php

    // $user_id = $_SESSION['user_id'];

    // $result_post = $controllers->join_show_all("*", "article ar", "images img", "ar.image_id = img.image_id", "ar.user_id = '$user_id'");


    
    if(isset($_GET['catagory_sl_no'])){
        // that means the catagory sl no is set
        $get_catagory_id = $controllers->pure_data($_GET['catagory_sl_no']);

        // if the catagory sl no is set then it will get the data with get method
        
        if($get_catagory_id == ''){
            // that means the catagory id is blank and it will show the all data
            $result_post = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY img.image_id DESC");
        }else{
            // that means the catagory id is not blank and it will show the data by its catogory id no
            $result_post = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY img.image_id DESC", "ar.catagory_id='$get_catagory_id'");
        }
    }else{
        // that means the catagory sl no is not set and it will show the all data
        $result_post = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY img.image_id DESC");
    }

    



    // $result_post = $controllers->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY img.image_id DESC", "ar.catagory_id='3'");
    // $result_post = $controllers->show_all("article");

    if($result_post){
        if($result_post->num_rows > 0){
            // that means user has been published posts
            while($row = $result_post->fetch_assoc()){
                echo '
    <div class="content-section">
        <div class="row">
            <div class="col-12 contents mb-4 pb-4">
                <!-- img section starts here -->
                <!-- <img src="/assets/img/artical_book.jpg" class="img-fluid" alt=""> -->
                <!-- img section ends here -->
                <div class="post_info_section mt-4">
                    <div class="person_details">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 d-flex">
                                <div class="publisher_img mt-4 mb-4">
                                    <img src="'. $controllers->show_user_image($row['user_img_name']) .'" class="img-fluid publisher_img rounded-circle" style="min-height: 50px !important;" alt="">

                                </div>
                                <div class="publisher_info mt-4 mb-4 ms-2">
                                    <div class="publisher_name fw-bold ms-2">'.$row['user_name'].'</div>
                                    <div class="published_time ms-2">'. $controllers->blog_post_date($row['datetime']) .' (' . $controllers->calculateDate($row['datetime']) . ' days ago)</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="read_time_section mt-4 text-dark text-end">'.$controllers->calculateReadTime($row['description']).' min
                                    read</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="back_img_content" style="background-image: url(assets/uploads/img/'. $row['image_name'] .');"></div>

                <div class="text-contents-title mt-4 fs-3 ">
                    <p> '.$row['title'].'</p>
                </div>
                <div class="text-contents-title mt-4 fs-5 ">
                    <p> '.$row['sub_title'].'</p>
                </div>

                <a href="/blogs?blog_sl_no='.$row['article_id'].'&catagory_sl_no='.$row['catagory_id'].'">
                <div class="button-section btn  text-dark bg-light content-read-more-btn text-light">
                    Read More</div>
                </a>
            </div>
        </div>
    </div>
    ';
            }

        }else{
            // that means the user does not published any posts yet
            echo '
            <script>
            danger_alert("Sorry, we have not published the blogs yet !", "We will publish the blogs as soon as possible. Please be connected with us !!");
            </script>
            ';

            echo '
            
            <div class = "notice_section fs-2 text-center mt-4">
            No blogs has been found !!
            
            </div>
            
            ';


        }
    }

    

    ?>
</div>