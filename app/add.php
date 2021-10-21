<?php

if(isset($_POST['fname']) || isset($_POST['phone']) || isset($_POST['bank'])) {
    require "../db_conn.php";

    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $bank = $_POST['bank'];

    if(empty($fname) && empty($phone) && empty($bank)) {
        header("Location: ../index.php?mess=Error");
    } else if(empty($fname)) {
        header("Location: ../index.php?mess=fnameError");
    } else if(empty($phone)) {
        header("Location: ../index.php?mess=phoneError");
    } else if(empty($bank)) {
        header("Location: ../index.php?mess=bankError");
    } else {

        $sql = "INSERT INTO telephones(fname, phone, bank)
                         VALUES (:fname, :phone, :bank)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([':fname' => $fname, ':phone' => $phone, ':bank' => $bank]);

        if($res) {
            header("Location: ../index.php?mess=success");
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}