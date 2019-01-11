<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 02.01.2019
 * Time: 23:10
 */

namespace Core;
use PDO;
class Mapper
{
    public function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'nix';
        $user = 'bohdanov';
        $pass = '1111';
        $charset = 'utf8';
      //  $db_config=require_once  '../App/config/db_config.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
          return $pdo= new PDO($dsn,$user,$pass);
    }
}