<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;

$active_title = "Verify your email";

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/navbar.php';

$controllers->login_check();


// $_SESSION['verify_email_sent_otp_status'] = "otp sent";

if(!isset($_SESSION['verify_email_sent_otp_status']) || $_SESSION['verify_email_sent_otp_status'] != "otp sent"){
    echo '
    
    <script>
    
    window.location.href = "/email_verify";
    
    </script>
    
    
    ';
}


?>

<main>



    <div class="container d-flex justify-content-center">


<form action="" method="post">
    
<div class="login_section mt-4">
            <div class="alert_section">
                <?php

                $controllers->verify_email();

                ?>
            </div>
            <div class="mb-4 fs-2 text-center ">
                Verify your email
            </div>
          
            <div class="mb-3">
                <!-- <label for="email " class="">Email</label> -->
                <input type="hidden" name="email" id="email" class="form-control signup_login_input mt-2" value="<?php echo $_SESSION['verify_otp_email_address'] ?>">
            </div>
            <div class="mb-3">
                <label for="email " class="">Otp</label>
                <input type="number" name="otp" id="email" class="form-control signup_login_input mt-2" ">
            </div>
         
        

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="cus-bg-primary-color btn text-light p-2 mt-4 text-center hero_get_started_btn " style="min-width: 25vw; min-height: 5vh" name="verify_email">Verify Email</button>
            </div>

            <div class="mb-3 mt-5">
                <div class="login_info_section">
                    <label for="">Don't have an account ?</label>
                    <a href="/signup" class="">Signup</a> with your information
                </div>
            </div>
            <div class="mb-3 mt-2">
                <div class="login_info_section">
                    <label for="">Are you have forgot your password ?</label>
                    <a href="/signup" class="">Recover password</a> with your information
                </div>
            </div>

        </div>
</form>
    </div>
</main>


<?php
// require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/footer_scripts.php';


?>