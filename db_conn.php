<?php

$dbHost="eu-cdbr-west-01.cleardb.com";
$dbUser="bb03da1cbb1d04";
$dbPass="315f7012";
$dbName="test";
$dbport="3306";
$edit_state = false;

try {
    $dsn = "mysql:host=$dbHost;dbname=$dbName;port=$dbport";
    $conn = new PDO($dsn, $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}