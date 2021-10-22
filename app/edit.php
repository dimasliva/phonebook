<?php

if(isset($_POST['update'])) {
    require_once "../db_conn.php";


    $id = $_GET['id'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $bank = $_POST['bank'];

    $data = [
        ':fname' => $fname,
        ':phone' => $phone,
        ':bank' => $bank,
        ':id' => $id
    ];

    $sql = "UPDATE telephones SET fname=:fname, phone=:phone, bank=:bank WHERE id=:id";
    $stmt = $conn->prepare($sql);

    $res = $stmt->execute($data);
    if ($res) {
        header("Location: ../index.php");
    } else {
        echo "</br>Error updating record: " . $conn->errorInfo();
    }
    echo $stmt->rowCount()." records UPDATED";
    $conn = null;
    exit();
}