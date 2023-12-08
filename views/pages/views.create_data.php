<?php

// error_reporting(0);

header('Access-Control-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Method: GET');
header('Access-Control-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';

$controllers = new controllers;



// require './functions.php';

$request_method = $_SERVER['REQUEST_METHOD'];

$data_name = $_GET['data_name'];

// read_all_data


echo $controllers->read_all_data($request_method, $data_name);





?>