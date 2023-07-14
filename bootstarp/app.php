<?php
session_start();

require_once __DIR__ . "/../vendor/autoload.php";

// Loads ENVIRONMENT Variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require_once __DIR__ . "/../config/app.php";

require_once __DIR__ . "/../routes/web.php";
require_once __DIR__ . "/../routes/api.php";