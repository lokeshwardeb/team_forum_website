<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/navbar.php';



?>

<main>



    <div class="container d-flex justify-content-center">


<form action="" method="post">
    
<div class="login_section mt-4">
            <div class="alert_section">
                <?php

                $controllers->signup();

                ?>
            </div>
            <div class="mb-4 fs-2 text-center ">
                Sign Up
            </div>
            <div class="mb-3">
                <label for="name  " class="">Name</label>
                <input type="text" name="name" id="name" class="form-control signup_login_input mt-2">
            </div>
            <div class="mb-3">
                <label for="email " class="">Email</label>
                <input type="email" name="email" id="email" class="form-control signup_login_input mt-2">
            </div>
            <div class="mb-3">
                <label for="name " class="d-block ">Password</label>
                <div class="input_section d-flex">
                    <input type="password" name="password" id="signup_pass" class="form-control signup_login_input mt-2">
                    <button type="button" class="btn" onclick="signup_show_pass()"><i class="fa-solid fa-eye" id="signup_pass_icon"></i></button>
                </div>
            </div>
            <div class="mb-3">
                <label for="name mb-4 pb-4" class="d-block ">Confirm your password</label>
                <div class="input_section d-flex">
                    <input type="password" name="cpassword" id="signup_cpass" class="form-control signup_login_input mt-2">
                    <button type="button" class="btn" onclick="signup_show_cpass()"><i class="fa-solid fa-eye" id="signup_cpass_icon"></i>
                </div>
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="cus-bg-primary-color btn text-light p-2 mt-4 text-center hero_get_started_btn " style="min-width: 25vw; min-height: 5vh" name="signup_btn">Signup</button>
            </div>
        </div>
</form>
    </div>
</main>


<?php
// require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/footer_scripts.php';


?>