<?php
include '../vendor/autoload.php';
if (isset($_COOKIE['PHPSESSID'])){
    session_start();
}
use Core\App;
$app = new App();

