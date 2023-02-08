<?php

include("../broker.php");
session_start();

if (isset($_POST['add'])) {
    $naslov = $_POST['naslov'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $tiraz = $_POST['tiraz'];
    $id =  $_SESSION['user_id'];




    $query = "INSERT INTO knjiga(naslov,cena,opis,tiraz,userID) VALUES('$naslov', '$cena','$opis','$tiraz','$id')";
    $result = $conn->query($query);

    if ($result) {
        echo 'Success';
    } else {
        echo "Failed";
    }



    header("Location: ../home.php");
}
