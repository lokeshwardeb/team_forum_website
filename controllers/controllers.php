<?php

require_once __DIR__ . '/../config/conn.php';
require_once __DIR__ . '/../models/models.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';


$model = new sql_info;

class Controllers extends sql_info
{

    public function change_password(){
        if(isset($_POST['change_pass'])){
            $otp = $this->pure_data($_POST['otp']);
            $new_pass = $this->pure_data($_POST['new_pass']);



            $name = $_SESSION['recover_pass_name'];
            $email = $_SESSION['recover_pass_email'];

            $result_check_user = $this->show_where("users", "`user_name` = '$name' AND `email` = '$email'");

            if($result_check_user){
                if($result_check_user->num_rows == 1){
                    // that means there are only one user exists

                    while($row = $result_check_user->fetch_assoc()){

                        $hash = password_hash($new_pass, PASSWORD_DEFAULT);
                        
                        $result_update_pass = $this->update_where("users", "`password` = '$hash'");

                        if($result_update_pass){

                            $remove_otp_result = $this->update_where("users", "`otp` = ''", "`user_name` = '$name' AND `email` = '$email'");

                            if($remove_otp_result){
                                echo '
                            
                                <script>
                                
                                success_alert("Password has been changed successfully !");
                                
                                </script>

                            
                            ';
                            }else{
                                echo '
                            
                            <script>
                            
                            success_alert("There was some issues while updating your password ! Please contact your developer or try again later !");
                            
                            </script>

                            
                            ';
                            }

                            
                        }

                    }

                }else{
                    // that means no user has been found and this will through an error

                    echo '
                    
                    <script>
                    
                    danger_alert("Users not found with your credentials", "Please give the correct credentials");
                    
                    </script>

                    
                    ';

                }
            }



            


        }
    }


    public function recover_password(){
        if(isset($_POST['recover_pass'])){
            $name = $this->pure_data($_POST['name']);
            $email = $this->pure_data($_POST['email']);

            $result = $this->show_where("users", "`user_name` = '$name' AND `email` = '$email'");

            if($result){
                if($result->num_rows == 1){
                    // that means the only one user is exists

                    $_SESSION['recover_pass_status'] = 'recover_pass_started';

                    $_SESSION['recover_pass_name'] = $name;
                    $_SESSION['recover_pass_email'] = $email;

                    $otp = rand(1111, 9999);

                    $update_pass_result = $this->update_where("users", "`otp` = '$otp'", "`user_name` = '$name' AND `email` = '$email'");





                    $mail_result = $this->mail("Dahuk Forum Website", $name, $email, "Your otp for the recover of your password", $this->mail_template($name, "otp_verify", $otp));

                    if($mail_result == 'mail_sent'){
                        echo '
                        
                        <script>
                        
                        success_alert("The otp has been sent on your email address '. $email . '", "Please recover your password with the otp");

                        window.location.href = "/recover_change_pass"

                        </script>
                        
                        ';
                    }else{
                        echo '
                        
                        <script>
                        
                        danger_alert("The otp cannot been sent on your email address '. $email . '", "Please try again !!");

                        </script>
                        
                        ';
                    }



                }else{
                    // that means the user are not exits and this will through an error

                    echo '
                    
                    <script>
                    
                    danger_alert("User not exists !", "The users are not exists with your credentials. Please give correct credentials !!");

                    </script>

                    ';

                }
            }


        }
    }


    public function mail_template($username, $email_type, $otp = "", $website_name = "Dahuk Forum Website"){

        $current_date =  date("Y-m-d");
        $current_dayname = date("l");
        $time_zone =  date_default_timezone_set("Asia/Dhaka");
        $current_time =  date("h:i:sa");
        $current_year = date("Y");

        $currentTimezone = date_default_timezone_get();



        if($email_type == 'new_login_found'){
            return ("<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>New login was found on your account -- $website_name'</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>

<body>
    <div class='container bg-primary' style='background-color: #B68C5A !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
        <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
        <center style = 'color:white !important;'> <h1>$website_name </h1></center>
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>



            Hi $username, <br>
            New login was found on your <b>$website_name</b> user account . You can ignore it if you was logged in to your account. If you was not logged in with your account please change your password and contract us immediately. Thanks. <br>

            <b>Loggedin time: $current_time </b> <br>
            <b>Loggedin date: $current_date </b><br>
            <b>Dayname: $current_dayname </b><br>
            <b>Timezone: $currentTimezone </b><br>

    
        </div>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
            &copy; All right are reserved by  $website_name  || Copyright by $website_name
        </center>

    </div>
    <!-- <h1>Hello, world!</h1> -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




</body>

</html>");
        }elseif($email_type = 'otp_verify'){
            return ("<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>New login was found on your account -- $website_name'</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>

<body>
    <div class='container bg-primary' style='background-color: #B68C5A !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px; justify-content: center !important;'>

    
    <center>
    <div id='' class='d-flex logo-section fs-4' style='justify-content: center !important;display: flex; font-size: 26px !important; background-color: white !important; text-align: center !important; padding: 25px !important;'>
                            <div class='logo_part_1 fw-bold cus-primary-color' style='color: #B68C5A;'>D</div>
                            <div class='logo_part_2' style='color: black';>ahuk</div>
                        </div>
    
    </center>

  
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>





            Hi $username, <br>
            Your request for otp verification on <b>$website_name</b> user account has been found . Please verify with your otp <br><br>
            
            <center><h1>Here is your otp</h1></center>

            <center><h1>$otp</h1></center>

            
            
            <br><br>
            
            
            You can ignore it if you was logged in to your account. If you was not logged in with your account please change your password and contract us immediately. Thanks. <br>
    
        </div>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
            &copy; All right are reserved by  $website_name  || Copyright by $website_name
        </center>

    </div>
    <!-- <h1>Hello, world!</h1> -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




</body>

</html>");
        }
    }

    public function mail($from_name = "Dahuk Forum Website", $to_name, $to_address, $email_subject, $email_body){
        

// //Load Composer's autoloader
// require __DIR__ . '/../vendor/autoload.php';
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'birathostmailsmtp@gmail.com';                     //SMTP username
    $mail->Password   = 'qobifpydqrvlgwbv';  // qobi fpyd qrvl gwbv                              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("birathostmailsmtp@gmail.com", "Dahuk Forum Website");
    $mail->addAddress("$to_address", "$to_name");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$email_subject";
    $mail->Body    = "$email_body";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

    if($mail->send()){
        return "mail_sent";
    }else{
        return "mail_not_sent";
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }



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

                    // $email_verify_status;
                    while($row = $result->fetch_assoc()){
                        $db_email = $row['email'];
                    }

                    if($email == $db_email){
                        // that means the email is already verified
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
    
                    }else{
                        // that means the email is not verified and has to be verified
                        if($user_img_name != ''){
                            // that means the user img is not blank
    
                            $check_emails_result = $this->show_where("users", "`email` = '$email'");

                            if($check_emails_result){
                                if($check_emails_result->num_rows > 0){
                                    // that means there the email is already exists on the software and this will through an error and will not process further

                                    echo '
                                    
                                    <script>
                                    
                                    danger_alert("Error ! The user is already exists with the email ! You cannot update with the same email", "If you want to update your email please use another email. You cannot update with the email which already exists on our software !!"");

                                    </script>
                                    
                                    ';

                                }else{
                                    // that means the email is not exists on the software and will continue further

                                    $this->update_where("users", "`email_verification_status` = ''", "`user_id` = '$user_id'");
    
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
             


                                }
                            }

                           
    
    
                            
                         // duc
                        }
                        else{
                             // that means the img is not selected

                            $check_emails_exists_result = $this->show_where("users", "`email` = '$email'");

                            if($check_emails_exists_result){
                                if($check_emails_exists_result->num_rows > 0){
                                    // that means the user is already exists with the email and we cannot process further and this will through an error

                                    echo '
                                    
                                    <script>
                                    
                                    danger_alert("Error ! The user is already exists with the email ! You cannot update with the same email", "If you want to update your email please use another email. You cannot update with the email which already exists on our software !!");

                                    </script>



                                    ';

                                    
                                }else{
                                    // that means the user is not exists with the email and we can process further this will not through an error

                                    
                            $this->update_where("users", "`email_verification_status` = ''", "`user_id` = '$user_id'");
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



    public function verify_email(){
        if(isset($_POST['verify_email'])){
            $email = $this->pure_data($_POST['email']);
            $otp = $this->pure_data($_POST['otp']);

            $user_id = $_SESSION['user_id'];

            // $result_check_email = $this->show_where("users", "`email` = '$email'");
            $result_check_email = $this->show_where("users", "`user_id` = '$user_id'");

            if($result_check_email){
                if($result_check_email->num_rows == 1){
                    while($row =$result_check_email->fetch_assoc()){
                        $verify_otp = $row['otp'];

                        if($verify_otp == $otp){
                            $email_verify_status_result = $this->update_where("users", "`email_verification_status` = 'email_verified'", "`user_id` = '$user_id'");
                            
                            $email_update = $this->update_where("users", "`email` = '$email'", "`user_id` = '$user_id'");

                            unset($_SESSION['verify_otp_email_address']);
                            unset($_SESSION['verify_email_sent_otp_status']);

                            if($email_verify_status_result){
                                
                                


                                

                            echo '
                            
                            <script>
                            success_alert("Your email has been verified successfully");

                            window.location.href="/publisher_home";
                            </script>
                            
                            ';
                            }

                        }

                    }
                }
            }


        }
    }

    public function send_otp_email_verification(){
        if(isset($_POST['send_email_verify_otp'])){
            $email = $this->pure_data($_POST['email']);

            $username = $_SESSION['username'];

            $otp = rand(1111, 9999);

            $user_id = $_SESSION['user_id'];

            // checking if the email is already exists on the software
            $result_email_check_conflit = $this->show_where("users", "`email` = '$email'");

            if($result_email_check_conflit){
                if($result_email_check_conflit->num_rows > 1){
                    // that means there can be only one user with the email if the user number is greter than 1 user that means there are other users who have the same email
                    
                    // that means there are the same email exists on the software and we cannot go further. this will through an error and will return the process from the start to 0 stage and will continue the process from starting stage

                    echo '
                    
                    <script>
                    danger_alert("Error ! The user is already exists with the email !", "Please use another email to register or verify");
                    </script>
                    
                    ';


                }else{
                    

            // $update_otp = $this->update_where("users", "`otp` = '$otp'", "`user_name` = '$username' AND `email` = '$email'");
            $update_otp = $this->update_where("users", "`otp` = '$otp'", "`user_id` = '$user_id'");

            $result = $this->mail("Dahuk Forum Website", "$username", $email, "Verify your email -- Dahuk Forum Website", $this->mail_template($username, "otp_verify", $otp));

            if($result == "mail_sent"){
                // that means the mail is sent

                $_SESSION['verify_email_sent_otp_status'] = "otp sent";
                $_SESSION['verify_otp_email_address'] = $email;


                echo '
                        
                <script>
                success_alert("The otp has been sent to your email address :- '. $email .'. Please verify with your otp !!", "Please wait while we are processing");

                // setTimeout(function(){
                //         window.location.href="/email_verify_otp_confirm";
                //      }, 5000);
                    
                window.location.href="/email_verify_otp_confirm";

                </script>
                
                ';

            }else{
                echo '
                        
                <script>
                danger_alert("The otp has not been sent to your email address. Please verify with your otp !!", "We are facing some issues while sending the with the mail. Please try again later. We are working to solve the issues !!");

                </script>
                
                ';
            }

                }
            }



        }
    }


    // this function is for checking is the email is verified or not
    public function check_verify_email($email){
        // this function checks wheather the email is verified or not

        // if the email is not verified then it will redirect to the email verification center


        $result_check_email = $this->show_where("users", "`email` = '$email'");

        if($result_check_email){
            if($result_check_email->num_rows == 1){
                while($row = $result_check_email->fetch_assoc()){
                    if($row['email_verification_status'] == '' || $row['email_verification_status'] == 'not_verified'){
                        // that means the email is not verified and has to be verified

                        // return "email_not_verified";

                        echo '
                        
                        <script>
                        
                        location.href = "/email_verify"

                        </script>

                        
                        ';


                    }else{
                        // return "email_verified";
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

                            $username = $_SESSION['username'];

                            $this->mail("", "$username", "$email", "New login has been found -- Dahuk Forum Website", $this->mail_template("$username", "new_login_found"));

                            header('location: /publisher_home');

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
