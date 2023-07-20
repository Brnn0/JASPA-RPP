<?php
#primeiro controller a ser chamado por padrao
$index = "Principal";

$host = "app/database/database.sqlite";
#$host = "localhost";
#$dbname = "database";
#$user = "root";
#$pass = "";


$pdo = new \PDO("sqlite:" . $host);