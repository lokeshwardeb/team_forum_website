<div class="container mt-4 mb-4 pt-4">
    <?php

    $user_id = $_SESSION['user_id'];

    $result_post = $controllers->join_show_all("*", "article ar", "images img", "ar.image_id = img.image_id", "", "ar.user_id = '$user_id'");

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
                                    <img src="/assets/img/man1.jpg" class="img-fluid publisher_img rounded-circle" alt="">

                                </div>
                                <div class="publisher_info mt-4 mb-4 ms-2">
                                    <div class="publisher_name fw-bold ms-2">'.$_SESSION['username'].'</div>
                                    <div class="published_time ms-2">MAR 14 (14 days ago)</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="read_time_section mt-4 text-dark text-end">5 min
                                    read</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="back_img_content"></div>

                <div class="text-contents-title mt-4 fs-4 ">
                    <p> '.$row['title'].'</p>
                </div>
                <div class="text-contents-title mt-4 fs-5 ">
                    <p> '.$row['sub_title'].'</p>
                </div>

                <div class="button-section btn  text-dark bg-light content-read-more-btn text-light">
                    Read More</div>
            </div>
        </div>
    </div>
    ';
            }

        }else{
            // that means the user does not published any posts yet
            echo '
            <script>
            danger_alert("You have not published any blogs yet !", "You have not published any blogs yet ! Please publish blogs so that you can access it from here");
            </script>
            ';
        }
    }

    

    ?>
</div>