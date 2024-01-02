<?php

require_once __DIR__ . '/../config/conn.php';
require_once __DIR__ . '/../models/models.php';

$model = new sql_info;

class Controllers extends sql_info
{

    public function dashboard_active_class($active_class)
    {
        if ($active_class == 'active_class') {
            return 'dashboard-link-actived';
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


            $album_id = $catagory;

            // echo 'the img type is : ' . $img_type;

            $image_path = __DIR__ . '/../assets/uploads/img/' . $img_name;


            $the_result = $this->show_where("article", " `album_id` = '$album_id' AND `catagory_id` = '$catagory' AND `title` = '$title' AND `sub_title` = '$sub_title' AND `description` = '$article'");

            if($the_result){
                if($the_result->num_rows > 0){
                    echo '
                    
                    <script>
                    danger_alert("The blog already published !", "This blog has been already published ! Please publish another blog !!");
    
                    </script>

                    ';

                    // echo 'the danger';
                }else{
                    
                    
                $result_img = $this->insert_where("images", "`album_id`, `image_path`, `image_type`", "'$album_id', '$image_path', '$img_type'");

                // $result_select = $this->show_all("images", " ORDER BY `images`.`image_id` DESC");
                $result_select = $this->show_all("images");
    
                if ($result_select) {
                    if ($result_select->num_rows > 0) {
                        while ($row = $result_select->fetch_assoc()) {
                            $last_img_id = $row['image_id'];
                        }
                    }
                }
    
    
    
                $result = $this->insert_where("article", "`album_id`, `catagory_id`, `title`, `sub_title`, `description`, `image_id`", "'$album_id', '$catagory', '$title', '$sub_title', '$article', '$last_img_id'");
    
    
    
    
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
                    }else{
                        // that means if the blog are not published successfully
                        echo '
                
                        <script>
                        danger_alert("The blog are not published successfully !");
        
                        </script>
                        
                        ';
                    }
                }else{
                    // that means if the image are not inserted successfully
                    echo '
                
                    <script>
                    danger_alert("The blog published but the image cannot be published !");
    
                    </script>
                    
                    ';
                }
    
    
    
    
    

                    
                }
            }else{
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


    public function signup(){
        if(isset($_POST['signup_btn'])){
            $name = $this->pure_data($_POST['name']);
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);
            $cpassword = $this->pure_data($_POST['cpassword']);

            if($password == $cpassword){
                // that means the entered the same password

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $result = $this->insert_where("users", "`user_name`, `email`, `password`", "'$name', '$email', '$hash'");

                if($result){
                    echo '
                    
                    <script>
                    
                    success_alert("Signed Up Successfully", "Your account has been signed up successfully");

                    </script>

                    ';
                }


            }else{
                // the password are not same
                echo '
                <script>
                
                danger_alert("Passwords are not same !!", "Your entered password are not same. Please enter the same password");

                </script>
                
                ';
            }
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
