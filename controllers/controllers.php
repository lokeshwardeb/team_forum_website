<?php

require_once __DIR__ . '/../config/conn.php';
require_once __DIR__ . '/../models/models.php';

$model = new sql_info;

class Controllers extends sql_info
{

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

                            if(isset($_GET['data_id'])){
                                // if the data id is exists on the url

                                $get_data_id = $_GET['data_id'];

                                $data_id_make = $data_name . '_id'; // example : catarogy_id

                                $get_one_data_result = $this->show_where("$data_name", "`$data_id_make` = '$get_data_id'");

                                if($get_one_data_result->num_rows == 1){
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

                            }else{
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
