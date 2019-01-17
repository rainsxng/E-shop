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

        $db_config=require_once  '../App/config/db_config.php';
        define('DBHOST',$db_config['host']);
        define('DBNAME',$db_config['db']);
        define('DBUSER',$db_config['user']);
        define('DBPASS',$db_config['pass']);
        define('CHARSET',$db_config['charset']);
        $host = DBHOST;
        $db   = DBNAME;
        $user = DBUSER;
        $pass = DBPASS;
        $charset = CHARSET;
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        return $pdo= new PDO($dsn, $user, $pass);
    }
}
