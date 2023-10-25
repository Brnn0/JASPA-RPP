<?php
#primeiro controller a ser chamado por padrao
$index = "Principal";

// $host = "app/database/database.sqlite";

$host = "host=localhost;";
$dbname = "dbname=jaspa";
$user = "root";
$pass = "";


$pdo = new \PDO("mysql:" . $host.$dbname,$user,$pass);
// $pdo = new \PDO("sqlite:" . $host);