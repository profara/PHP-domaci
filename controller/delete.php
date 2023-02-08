<?php

include("../broker.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM knjiga WHERE knjigaID=$id";
    $result = $conn->query($query);

    if (!$result) {
        die("Upit nije izvrsen!");
    }
    header("Location:../home.php");
} else {
    echo "GET NIJE IZVRSEN";
}
