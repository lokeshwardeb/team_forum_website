<!-- <?php

session_start();

$user_name = $_SESSION['user_name'];

$data = array();

if(isset($_FILES['upload']['name'])){
    $file_name = $_FILES['upload']['name'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    // $upload_dir = __DIR__ . '/../../../assets/uploads/img/';
    $upload_dir =  '/assets/uploads/img/';

    $upload_name = $user_name . 'post_sub_img_' . date("d-m-Y h:i:sa");
    $uploaded_file = $upload_dir . $upload_name;

    $file_ext = pathinfo($uploaded_file, PATHINFO_EXTENSION);


    if($file_ext == 'jpeg' || $file_ext == 'jpg' || $file_ext == 'png'){
        if(move_uploaded_file($file_tmp, $uploaded_file)){
            $data['file'] = $upload_name;
            $data['url'] = $upload_dir;
            $data['uploaded'] = 1;
        }else{
            $data['uploaded'] = 0;
            $data['error']['message'] = "File not uploaded";
        }
    }else{
        $data['uploaded'] = 0;
        $data['error']['message'] = "Invalid extension ";

    }






}

// echo json_encode($data);


?>
 -->












 <?php

header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDirectory = __DIR__ . '/../../assets/uploads/img/';
    $uploadedFile = $uploadDirectory . basename($_FILES['image']['name']);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
        $response['success'] = true;
        $response['url'] = '/' . $uploadedFile; // Adjust the URL based on your project structure
    } else {
        $response['success'] = false;
        $response['error']['message'] = 'File upload failed';
    }
} else {
    $response['success'] = false;
    $response['error']['message'] = 'Invalid request';
}

echo json_encode($response);
