<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;

$active_title = "Login";

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/navbar.php';

// $controllers->mail("this", "d@d.d", "bir", "biratdeb82@gmail.com", "This is the check mail", $controllers->mail_template("Dahuk Forum Website", "bir"));


$controllers->mail("Dahuk Forum Website", "birathostmail@gmail.com", "Birat Deb", "biratdeb82@gmail.com", "The otp mail testing check", $controllers->mail_template("Birat Deb", "otp_verify", "4565"));



?>




<?php
// require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/footer_scripts.php';


?>