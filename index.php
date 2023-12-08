<?php
// get the url typed on the url bar
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Routes = [
    '/' => __DIR__ . '/views/pages/views.index.php',
    '/dashboard' => __DIR__ . '/views/pages/views.index.php',
    '/read_all_data' => __DIR__ . '/views/pages/views.read_all_data.php',
    '/create_data' => __DIR__ . '/views/pages/views.create_data.php',
    // '/get_token' => __DIR__ . '/views/pages/views.get_token.php',

];

// checking if the routes is registed on the the system

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/views/error_page/views.error_page.php';
}




?>