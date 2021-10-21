<?php

    require "../db_conn.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM telephones WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([':id' == $id]);

    if ($res) {
        echo "Deleting: $id";
    } else {
        echo "Failed";
    }

