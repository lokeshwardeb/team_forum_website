<?php

require_once __DIR__ . '/../config/conn.php';
require_once __DIR__ . '/../models/models.php';

$model = new sql_info;

class Controllers extends sql_info
{

    public function delete_blog(){
        if(isset($_POST['delete_blog_btn'])){
            $blog_id = $this->pure_data($_POST['blog_id']);

            // $result_check = $this->show_where("article", "`article_id` = '$blog_id'");
            $result_check = $this->join_2_show_all("*", "`article` ar", "`images` img", "ar.image_id = img.image_id", "`users` u", "u.user_id = ar.user_id", "ORDER BY img.image_id DESC", "ar.article_id = '$blog_id'");

            if($result_check){
                if($result_check->num_rows == 1){
                    // that means the only one article data exists

                    while($row = $result_check->fetch_assoc()){

                       $image_id = $row['image_id'];
                       $image_name = $row['image_name'];

                       
                       $upload_dir = './assets/uploads/img/';
                       
                    echo   $upload_image = $upload_dir . $image_name;
                       
                       $result_delete = $this->delete_where("article", "`article_id` = '$blog_id'");



                        if($result_delete){
                            // that means the article has been deleted successfully and now processing with further

                            $result_delete_img = $this->delete_where("images",  "`image_id` = '$image_id'");


                            if($result_delete_img){

                                if($image_name != ''){
                                    if(file_exists($upload_image)){
                                        if(unlink($upload_image)){
                                            // that means the image has been deleted successfully from the software
                                            echo '
                                
                                                <script>
                                                
                                                success_alert("The blog post has been deleted successfully !", "Your blog post has been deleted successfully");
                        
                                                </script>
                                                
                        
                                                ';
                                        }else{
                                            // that means there was some issues while deleting the images from the software
                                            echo '
                                
                                            <script>
                                            
                                            danger_alert("The blog post has not been deleted successfully !", "There was some error while deleting the blog ! Please contact the developer if you are facing the problem for a long time !!");
                    
                                            </script>
                                            
                    
                                            ';
                                        }
                                    }else{
                                        // that means the image file is not exists 
    
                                        echo '
                                
                                        <script>
                                        
                                        success_alert("The article of the  blog post has not been deleted successfully but the image was not found !", "The image was not found while deleting the blog. But the article has been deleted from our software. If your blog was not contained an image then you can ignore this message, but if your blog was contained an image then please contact with your developer with the issue ! Please contact the developer if your article was contained an image and if are facing the problem for a long time !!");
                
                                        </script>
                                        
                
                                        ';
                                    }
                                }else{
                                    // that means there was not image contains on the post

                                    // and that means the deletation was successfull and this will show the success alert message
                                    echo '
                                
                                    <script>
                                    
                                    success_alert("The blog post has been deleted successfully !", "Your blog post has been deleted successfully");
            
                                    </script>
                                    
            
                                    ';
                                }

                         
                            }


    
                       
                        }else{
                            // that means there was error while deleting the article

                            echo '
                            
                            <script>
                            
                            danger_alert("The blog post has not been deleted successfully !", "There was some error while deleting the blog ! Please contact the developer if you are facing the problem for a long time !!");
    
                            </script>
                            
    
                            ';
                        }



                    }
                 

                   

                }else{
                    echo '
                                
                    <script>
                    
                    danger_alert("The blog post has not found !", "Your blog post has not found. This may cause because you may have deleted the post. If you have not deleted the post and you are viewing this alert then please contact our developer !!");

                    // using 10s delay on redirection
                    setTimeout(function(){
                        location.href="/manage_blog";
                         }, 10000);
                        
                

                    </script>
                    

                    ';
                }
            }


        }
    }

    

    public function show_blog_post_image($image_name){

        
        if($image_name != ''){

            $img_dir = './assets/uploads/img/';

            $img_upload = $img_dir . $image_name;

            // if(file_exists($img_upload)){
            //     $img = '<img src="'. $img_upload .'" class="img-fluid publisher_img rounded-circle" style="min-height: 50px !important;" alt="">';

            // }else{
            //     $img = '';

            // }

            $img = '<img src="'. $image_name .'" class="img-fluid publisher_img rounded-circle" style="min-height: 50px !important;" alt="">';

        }else{
            $img = '';
        }

        return $img;
    }
    public function show_user_image($image_name){
        if($image_name != ''){
            $img = '/assets/uploads/users_img/' . $image_name;
        }else{
            $img = '/assets/img/man1.jpg';
        }

        return $img;
    }

    public function blog_post_date($dbDate){
            // Storing the retrieved date in a variable
    // $dbDate = $row['date_column'];

    // Creating a DateTime object with the retrieved date
    $date = new DateTime($dbDate);

    // Formatting the date to display with the month name
    $formattedDate = $date->format('F j, Y'); // 'F' represents the full month name, 'j' for day without leading zeros, 'Y' for year (adjust format as needed)

    return $formattedDate;


    }

    public function calculateDate($dbDate){
        // Storing the retrieved date in a variable
    // $dbDate = $row['date_column'];
    
    // Creating DateTime objects for the database date and current date
    $databaseDate = new DateTime($dbDate);
    $currentDate = new DateTime();

    // Calculating the difference between the dates
    $interval = $currentDate->diff($databaseDate);
    
    // Getting the difference in days
    $daysDifference = $interval->format('%a');

    return $daysDifference;

    }

    // read time count functions
    public function calculateReadTime($content) {
        // Counting the number of words in the content
        $wordCount = str_word_count(strip_tags($content));
    
        // Assuming an average reading speed of 200 words per minute
        $wordsPerMinute = 200;
    
        // Calculating estimated read time in minutes
        $readTime = ceil($wordCount / $wordsPerMinute);
    
        return $readTime;
    }

    public function active_class($active_class)
    {
        if ($active_class == 'active_class') {
            return 'cus-primary-color';
        }
    }
    public function dashboard_active_class($active_class)
    {
        if ($active_class == 'active_class') {
            return 'dashboard-link-actived';
        }
    }

    public function update_settings(){
        if(isset($_POST['update_settings_btn'])){
            $user_id = $this->pure_data($_POST['user_id']);
            $user_name = $this->pure_data($_POST['user_name']);
            $email = $this->pure_data($_POST['email']);

            $user_img_name = $_FILES['img']['name'];
            $user_img_tmp_name = $_FILES['img']['tmp_name'];
            $user_img_type = $_FILES['img']['type'];

              $img_type = pathinfo($user_img_name, PATHINFO_EXTENSION);


            $upload_img_name = $user_name . '_user_img' . '.' . $img_type;
            $upload_dir = __DIR__ . '/../assets/uploads/users_img/';





            // check the users if it exists

            $result = $this->show_where("users", "`user_id` = '$user_id'");

            if($result){
                if($result->num_rows == 1){
                    // that means there will be only one user with the id
                    if($user_img_name != ''){
                        // that means the user img is not blank
                       $result_setting_update =  $this->update_where("users", "`user_name` = '$user_name', `email` = '$email', `user_img_name` = '$upload_img_name'", "`user_id` = '$user_id'");

                       if($result_setting_update){
                                                // $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $user_name;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_img_name'] = $upload_img_name;


                        $upload_img = $upload_dir . $upload_img_name;

                        if($img_type == 'jpg' || $img_type == 'jpeg' || $img_type == 'png'){

                            if(move_uploaded_file($user_img_tmp_name, $upload_img)){
                                echo '
                            
                                <script>
                                
                                success_alert("The informations has been updated successfully with image !");
        
                                
                                </scrip>
                                
                                ';
                            }else{
                                echo '
                            
                                <script>
                                
                                danger_alert("There was some error while uploading the user image !", "The image has not been uploaded successfully ! Please contact the developer !!");
        
                                
                                </script>
                                
                                ';
                            }
    
    
                        }else{
                            echo '
                            
                            <script>
                            
                            danger_alert("Your uploaded file is not an image", "Please select an image for uploading as user image !!");
    
                            
                            </script>
                            
                            ';
                        }
               
                       }else{
                        echo '
                        
                        <script>
                        
                        danger_alert("There was some error while updating the information !");

                        
                        </script>
                        
                        ';
                       }



                        

                    }else{
                        // that means the img is not selected
                      $result_update =  $this->update_where("users", "`user_name` = '$user_name', `email` = '$email', `user_img_name` = '$user_img_name'", "`user_id` = '$user_id'");

                      if($result_update){
                        $_SESSION['username'] = $user_name;
                        $_SESSION['user_email'] = $email;
                       
                        echo '
                        
                        <script>
                        
                        success_alert("The informations has been updated successfully !");

                        
                        </script>
                        
                        ';

                      }else{
                        echo '
                        
                        <script>
                        
                        danger_alert("There was some error while updating the information !");

                        
                        </script>
                        
                        ';
                      }
                       

                    }

                }
            }


        }
    }

    public function add_new_blog()
    {
        if (isset($_POST['add_new_blog'])) {
            $title = $this->pure_data($_POST['title']);
            $catagory = $this->pure_data($_POST['catagory']);
            $sub_title = $this->pure_data($_POST['sub_title']);
            $article = $this->pure_data($_POST['article']);
            $img_name = $_FILES['img']['name'];
            $img_tmp_name = $_FILES['img']['tmp_name'];
            $img_type = $_FILES['img']['type'];


            $user_id = $_SESSION['user_id'];

            $album_id = $catagory;

            // echo 'the img type is : ' . $img_type;

            $image_path = __DIR__ . '/../assets/uploads/img/' . $img_name;
            // $image_path =  '/assets/uploads/img/' . $img_name;


            $the_result = $this->show_where("article", " `album_id` = '$album_id' AND `catagory_id` = '$catagory' AND `title` = '$title' AND `sub_title` = '$sub_title' AND `description` = '$article'");

            if ($the_result) {
                if ($the_result->num_rows > 0) {
                    echo '
                    
                    <script>
                    danger_alert("The blog already published !", "This blog has been already published ! Please publish another blog !!");
    
                    </script>

                    ';

                    // echo 'the danger';
                } else {


                    $result_img = $this->insert_where("images", "`album_id`, `image_name`, `image_type`", "'$album_id', '$img_name', '$img_type'");

                    // $result_select = $this->show_all("images", " ORDER BY `images`.`image_id` DESC");
                    $result_select = $this->show_all("images");

                    if ($result_select) {
                        if ($result_select->num_rows > 0) {
                            while ($row = $result_select->fetch_assoc()) {
                                $last_img_id = $row['image_id'];
                            }
                        }
                    }



                    $result = $this->insert_where("article", "`album_id`, `catagory_id`, `title`, `sub_title`, `description`, `image_id`, `user_id`", "'$album_id', '$catagory', '$title', '$sub_title', '$article', '$last_img_id', '$user_id'");




                    if ($result_img) {
                        if ($result) {

                            echo '
                
                        <script>
                        success_alert("The new blog has been added successfully");
            
                        </script>
                        
                        ';

                            if (move_uploaded_file($img_tmp_name, $image_path)) {
                                echo '
                
                            <script>
                            success_alert("The new blog has been added successfully with image !");
            
                            </script>
                            
                            ';
                            }
                        } else {
                            // that means if the blog are not published successfully
                            echo '
                
                        <script>
                        danger_alert("The blog are not published successfully !");
        
                        </script>
                        
                        ';
                        }
                    } else {
                        // that means if the image are not inserted successfully
                        echo '
                
                    <script>
                    danger_alert("The blog published but the image cannot be published !");
    
                    </script>
                    
                    ';
                    }
                }
            } else {
                echo '
                
                <script>
                danger_alert("Something error has been occured !", "Please contract the developer, something internal issues has been found !!");

                </script>
                
                ';
            }









            // echo '

            // <script>
            // success_alert("The new blog has been added successfully");

            // </script>

            // ';


        }
    }

    public function update_blog()
    {
        if (isset($_POST['update_blog_btn'])) {
            $title = $this->pure_data($_POST['title']);
            $sub_title = $this->pure_data($_POST['sub_title']);
            $catagory = $this->pure_data($_POST['catagory']);
            // $article = $this->pure_data($_POST['article']);
            $article = $this->pure_data($_POST['article']);

            $img_name = $_FILES['img']['name'];
            $img_tmp_name = $_FILES['img']['tmp_name'];

            $upload_dir = __DIR__ . '/../assets/uploads/img/';

            $blog_id = $this->pure_data($_POST['blog_id']);

            $result = $this->show_where("article", "`article_id` = '$blog_id'");

            if ($result) {
                if ($result->num_rows == 1) {
                    // that means there are only one row will be exists

                    // getting the img id no 

                    while ($row = $result->fetch_assoc()) {
                        $get_img_id = $row['image_id'];
                    }


                    // updating the article

                    $result_update = $this->update_where("article", "`title` = '$title', `sub_title` = '$sub_title', `catagory_id` = '$catagory', `description` = '$article'", "`article_id` = '$blog_id'");

                    // if the image is not blank then it will update the new image name else if the image is equals to blank then it will not update the old image name again
                    if ($img_name != '') {
                        // updating the article img
                        $result_update_img = $this->update_where("images", "`image_name` = '$img_name'", "`image_id` = '$get_img_id'");
                    }

                    if ($result_update) {
                        // that means updated successfully


                        // if the image is not equals to blank that means there are new images seleted for updation upload then it will upload the new updated image on the server else it will not update anything
                        if ($img_name != '') {
                            if ($result_update_img) {

                                // if the file is not exist then it will upload on the server otherwise it will not upload the same file again

                                if (!file_exists($upload_dir . $img_name)) {
                                    move_uploaded_file($img_tmp_name, $upload_dir . $img_name);
                                    // echo 'the img has been inserted';
                                }
                            }

                            echo '
                            
                            <script>
                            success_alert("The blog has been updated with the image successfully", "The blog has been updated with its new values");
                            </script>
                            
                            ';
                        }else{
                            // that means the img is blank and will not be updated

                            echo '
                        
                            <script>
                            success_alert("The blog has been updated without the image successfully", "The blog has been updated with its new values");
                            </script>
                            
                            ';
                        }
                    } else {
                        // that means not updated successfully
                        echo '
                        
                        <script>
                        danger_alert("The blog has not been updated successfully", "There were some issues while updating the values !!");
                        </script>
                        
                        ';
                    }
                }
            }
        }
    }


    public function signup()
    {
        if (isset($_POST['signup_btn'])) {
            $name = $this->pure_data($_POST['name']);
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);
            $cpassword = $this->pure_data($_POST['cpassword']);

            if ($password == $cpassword) {
                // that means the entered the same password

                $result_check_user = $this->show_where("users", "`email` = '$email'");

                if ($result_check_user) {
                    if ($result_check_user->num_rows > 0) {
                        // that means the user already exists with the email
                        echo '
                    
                        <script>
                        
                        danger_alert("User already exists !", "User already exists with the email ! Please login with your credentials");
    
                        </script>
    
                        ';
                    } else {
                        // that means the user is not exists with the email

                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        $result = $this->insert_where("users", "`user_name`, `email`, `password`", "'$name', '$email', '$hash'");

                        if ($result) {
                            echo '
                    
                            <script>
                            
                            success_alert("Signed Up Successfully", "Your account has been signed up successfully");

                            </script>

                            ';
                        }
                    }
                } else {
                    // that means the result check user are not runs
                    echo '
                    
                    <script>
                    
                    danger_alert("Something Error !", "There are some error happens while processing with the signup functionalities ! Please contract the developer !");

                    </script>

                    ';
                }
            } else {
                // that means the password are not same
                echo '
                <script>
                
                danger_alert("Passwords are not same !!", "Your entered password are not same. Please enter the same password");

                </script>
                
                ';
            }
        }
    }



    public function login()
    {
        if (isset($_POST['login_btn'])) {
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);

            $result = $this->show_where("users", "`email` = '$email'");

            if ($result) {
                if ($result->num_rows == 1) {
                    // if the only one user is found
                    while ($row = $result->fetch_assoc()) {
                        $hash = $row['password'];

                        $password_verify = password_verify($password, $hash);

                        if ($password == $password_verify) {
                            // that means the password is correct
                            echo '
                            <script>
                            
                            success_alert("Loggedin Successfully !!", "Loggedin successfully with your credentials");

                            </script>
                            
                            ';

                            $_SESSION['login_status'] = 'loggedin';

                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['username'] = $row['user_name'];
                            $_SESSION['user_email'] = $row['email'];
                            $_SESSION['user_img_name'] = $row['user_img_name'];

                            // header('location: /publisher_home');

                            echo '
                            
                            <script>
                            location.href = "/publisher_home";
                            </script>
                            
                            ';


                        } else {
                            // that means the password is not correct
                            echo '
                            <script>
                            
                            danger_alert("Wrong password !!", "Please enter the correct password for login");

                            </script>
                            
                            ';
                        }
                    }
                } else {
                    // that means the user does not exist on db
                    echo '
                    <script>
                    
                    danger_alert("User does not exist !!", "Please enter the correct credentials");

                    </script>
                    
                    ';
                }
            }
        }
    }



    public function login_check()
    {
        if (!isset($_SESSION['login_status'])) {
            // that means if the user is not loggedin
            echo '
            
            <script>
            
            location.href = "/login"

            </script>
            
            ';
        }
    }


    // api functionalities codes

    public function check_token($get_token_no)
    {

        $token_status = false;

        $result = $this->show_where("access_tokens", "`token` = '$get_token_no'");

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $check_token = $row['token'];
                    if ($check_token == $get_token_no) {
                        // echo 'the token is true';
                        $token_status = true;
                    } else {
                        // echo 'the token is false';
                        $token_status = false;
                    }
                }
            }
        }

        return $token_status;
    }

    public function create_token()
    {
        if (isset($_POST['create_token'])) {
            $token_access_role = $_POST['token_access_role'];

            // generating the token

            $token =  bin2hex(random_bytes(8));

            $result_insert = $this->insert_where("access_tokens", "`token`, `token_access_role`", "'$token', '$token_access_role'");

            if ($result_insert) {

                return "token created successfully";
            }
        }
    }

    // public function check_the_table(){

    // }

    public function read_all_data($request_method, $data_name)
    {
        if (isset($_GET['token'])) {
            // checking if the token is given

            // if(isset($data_name)){
            //     // checking if the data name is given

            //     $check_data_name = $this->show_where($);

            // }

            $token = $_GET['token'];

            $check_token_status = $this->check_token($token);



            if ($check_token_status == true) {
                // if the token is correct and true
                if ($request_method == 'GET') {
                    // if the request method is get

                    $check_table_exist = $this->check_table($data_name);



                    if ($check_table_exist->num_rows > 0) {
                        // if the table exits on db
                        $result = $this->show_all("$data_name");


                        if ($result->num_rows > 0) {
                            // if the data is exists

                            if ($data_name == 'access_tokens') {
                                // if the data name is equals to access_tokens
                                $data = [
                                    'status' => 401,
                                    'message' => 'Unaurthorized access. You have not the access of this data',

                                ];

                                header("HTTP/1.0 401 Unaurthorized access. You have not the access of this data");
                                return json_encode($data);
                            }

                            if (isset($_GET['data_id'])) {
                                // if the data id is exists on the url

                                $get_data_id = $_GET['data_id'];

                                $data_id_make = $data_name . '_id'; // example : catarogy_id

                                $get_one_data_result = $this->show_where("$data_name", "`$data_id_make` = '$get_data_id'");

                                if ($get_one_data_result->num_rows == 1) {
                                    // if the data is equals to 1 data
                                    $get_one_data_main = $get_one_data_result->fetch_assoc();

                                    $data = [
                                        'status' => 200,
                                        'message' => 'Data Fetched Succesfully',
                                        'data' => $get_one_data_main,
                                    ];

                                    header("HTTP/1.0 200 Data Fetched Successfully");
                                    return json_encode($data);
                                }
                            } else {
                                // if the data id is not exists on the url

                            }



                            $get_data =  $result->fetch_all(MYSQLI_ASSOC);


                            $data = [
                                'status' => 200,
                                'message' => 'Data Fetched Succesfully',
                                'data' => $get_data,
                            ];

                            header("HTTP/1.0 200 Data Fetched Successfully");
                            return json_encode($data);
                        } else {
                            // if the data is not exist
                            $data = [
                                'status' => 404,
                                'message' => 'Data not found',

                            ];

                            header("HTTP/1.0 404 Data not found");
                            return json_encode($data);
                        }
                    } else {
                        // if the table does not db
                        // echo 'the table no exist';
                        $data = [
                            'status' => 500,
                            'message' => 'Internal Server Error. The collection of data (ta) not exist',

                        ];

                        header("HTTP/1.0 200 Data Fetched Successfully");
                        return json_encode($data);
                    }
                } else {
                    // if the request method is not get
                    $data = [
                        'status' => 200,
                        'message' => 'Data Fetched Succesfully',

                    ];

                    header("HTTP/1.0 200 Data Fetched Successfully");
                    return json_encode($data);
                }
            } else {
                // if the token is not correct and false
                $data = [
                    'status' => 401,
                    'message' => 'This is an unaurthrized request. Please give an aurthorized token',

                ];

                header("HTTP/1.0 401 This is an unaurthrized request. Please give an aurthorized token");
                return json_encode($data);
            }
        }
    }
}
