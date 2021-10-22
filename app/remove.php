<?php

    require "../db_conn.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM telephones WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        header('Location: ../index.php');
    } else {
        echo "Failed";
    }

