<?php
// get the url typed on the url bar
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Routes = [
    // '/' => __DIR__ . '/views/pages/views.index.php',
    // '/dashboard' => __DIR__ . '/views/pages/views.index.php',
    '/' => __DIR__ . '/views/pages/views.home.php',
    '/home' => __DIR__ . '/views/pages/views.home.php',
    '/blogs' => __DIR__ . '/views/pages/views.blogs.php',
    '/all_blogs' => __DIR__ . '/views/pages/views.all_blogs.php',
    '/testing' => __DIR__ . '/views/pages/testing/testing.php',
    '/template_check' => __DIR__ . '/views/pages/template_check.html',
    '/myhome' => __DIR__ . '/views/pages/myhome.html',
    '/publisher_home' => __DIR__ . '/views/pages/dashboard/views.publisher_home.php',
    '/add_blog' => __DIR__ . '/views/pages/dashboard/views.add_blog.php',
    '/update_blog' => __DIR__ . '/views/pages/dashboard/views.update_blog.php',
    '/manage_blog' => __DIR__ . '/views/pages/dashboard/views.manage_blog.php',
    '/my_all_blogs' => __DIR__ . '/views/pages/dashboard/views.my_all_blogs.php',
    '/my_team_members' => __DIR__ . '/views/pages/dashboard/views.my_team_members.php',
    '/settings' => __DIR__ . '/views/pages/dashboard/views.settings.php',
    '/signup' => __DIR__ . '/views/pages/views.signup.php',
    '/login' => __DIR__ . '/views/pages/views.login.php',
    '/logout' => __DIR__ . '/views/pages/views.logout.php',
    '/skeleton_publisher_home' => __DIR__ . '/views/pages/dashboard/skeletons/views.skeleton.publisher_home.php',
    '/skeleton_add_blog' => __DIR__ . '/views/pages/dashboard/skeletons/views.skeleton.add_blog.php',
    '/skeleton_manage_blog' => __DIR__ . '/views/pages/dashboard/skeletons/views.skeleton.manage_blog.php',
    '/skeleton_team_members' => __DIR__ . '/views/pages/dashboard/skeletons/views.skeleton.team_members.php',
    '/skeleton_my_all_blogs' => __DIR__ . '/views/pages/dashboard/skeletons/views.skeleton.my_all_blogs.php',
    // '/read_all_data' => __DIR__ . '/views/pages/views.read_all_data.php',
    // '/create_data' => __DIR__ . '/views/pages/views.create_data.php',
    // '/get_token' => __DIR__ . '/views/pages/views.get_token.php',

];

// checking if the routes is registed on the the system

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/views/error_page/views.error_page.php';
}




?>