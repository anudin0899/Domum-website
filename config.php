<?php
$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost; dbname=domum';

try {

$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch (PDOException $e) {
    echo "fail to connect to the database" .$e->getmessage();
}


?>