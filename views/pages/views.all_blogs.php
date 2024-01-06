<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new Controllers;


$active_title = "Blogs";


require_once __DIR__ . '/inc/header.php';


$active_class_nav_blogs = 'active_class';

$controllers->active_class($active_class_nav_blogs);

require_once __DIR__ . '/inc/navbar.php';



?>

<main>
       

      <?php

        // catagory section starts here

        // require_once __DIR__ . '/inc/show_catagory_blog.php';

        // require_once __DIR__ . '/inc/show_blog_post.php';

        require_once __DIR__ . '/inc/catagory.php';

        require_once __DIR__ . '/inc/blog_post.php';

        // catagory section ends here


       ?>




   </main>
   <!-- main code section ends here -->



<?php
require_once __DIR__ . '/inc/footer.php';
require_once __DIR__ . '/inc/footer_scripts.php';


?>

