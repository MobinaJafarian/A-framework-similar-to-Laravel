<?php 

require_once "../config/app.php";
require_once "../config/database.php";

require_once "../routes/web.php";
require_once "../routes/api.php";

$router = new \Core\Router\Router();
$router->checkRoute();