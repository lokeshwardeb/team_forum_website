<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;

$active_title = "Recover your password";

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/navbar.php';

// $_SESSION['recover_pass_status'] = 'recover_pass_started';
if(!isset($_SESSION['recover_pass_status']) || $_SESSION['recover_pass_status'] == ''){
    echo '
    
    <script>
    
    window.location.href = "/login"
    
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

                $controllers->change_password();

                ?>
            </div>
            <div class="mb-4 fs-2 text-center pb-4">
                Set your new password
            </div>
          
            <div class="mb-3">
                <label for="otp " class="">Otp</label>
                <input type="text" name="otp" id="otp" class="form-control signup_login_input mt-2">
            </div>
            
          
            <div class="mb-3">
                <label for="new_pass " class="">New password</label>
                <input type="text" name="new_pass" id="new_pass" class="form-control signup_login_input mt-2">
            </div>
            

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="cus-bg-primary-color btn text-light p-2 mt-4 text-center hero_get_started_btn " style="min-width: 25vw; min-height: 5vh" name="change_pass">Recover your password</button>
            </div>

            <div class="mb-3 mt-5">
                <div class="login_info_section">
                    <label for="">Don't have an account ?</label>
                    <a href="/signup" class="">Signup</a> with your information
                </div>
            </div>
            <div class="mb-3 mt-2">
                <div class="login_info_section">
                    <label for="">Already have an account ?</label>
                    <a href="/login" class="">Login</a> with your credentials
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