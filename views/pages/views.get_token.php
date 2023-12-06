<?php

require_once __DIR__ . '/../../config/conn.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';
$modal = new sql_info;

$controllers = new controllers;

// $controllers->check_token();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get token</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>

<body>
    welcome to get token

    <div class="container m-3">
        <?php

            echo $controllers->create_token();

        ?>
    </div>

    <form action="" method="post">
        <div class="container">
            <div class="mb-3">
                <label for="access_role">Give the access role</label>
                <input type="text" name="token_access_role" id="" class="form-control">

            </div>
            <button type="submit" class="btn btn-primary" name="create_token">Get token</button>

        </div>

    </form>

    <script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>