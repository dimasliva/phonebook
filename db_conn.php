<?php

$dbHost="localhost";
$dbUser="root";
$dbPass="root";
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

//$fname = $_POST['fname'];
//$phone = $_POST['phone'];
//$bank = $_POST['bank'];
//$sql = "CREATE TABLE IF NOT EXISTS telephones (
//    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//    fname VARCHAR(40) NOT NULL ,
//    phone VARCHAR(11) NOT NULL,
//    bank TEXT NOT NULL,
//    checked TINYINT(1) DEFAULT 0
//);";
//$conn->exec($sql);
//$pdoQuery = "INSERT INTO `telephones` (`fname`, `phone`, `bank`)
//VALUES (:fname, :phone, :bank)";
//$pdoResult = $conn->prepare($pdoQuery);
//$pdoExec = $pdoResult->execute(array(":fname" => $fname, ":phone"=>$phone, ":bank" => $bank));
//if($pdoExec) {
//    echo "Data Inserted";
//} else {
//    echo "Data not Inserted";
//}
