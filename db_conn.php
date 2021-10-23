<?php

$dbHost="eu-cdbr-west-01.cleardb.com";
$dbUser="bb03da1cbb1d04";
$dbPass="315f7012";
$dbName="heroku_6c2a5fad4553d00";
$dbport="3306";
$edit_state = false;

try {
    $dsn = "mysql:host=$dbHost;dbname=$dbName;port=$dbport";
    $conn = new PDO($dsn, $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS telephones (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname TEXT NOT NULL DEFAULT '',
    phone VARCHAR(11) NOT NULL DEFAULT '',
    bank TEXT NOT NULL DEFAULT '',
    checked TINYINT(1) DEFAULT 0
)";
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}
