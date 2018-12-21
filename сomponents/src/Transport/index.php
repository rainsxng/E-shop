<?php
require_once '..\..\vendor\autoload.php';
include_once 'TransportMailer.php';
use app\Transport\TransportMailer;
$sender = new TransportMailer();
$sender->send("Важное сообщение","Просто сообщение");

