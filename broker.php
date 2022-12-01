<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "blackberries";

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_errno){
    printf("Konekcija nije uspela: $s\n", $conn->connect_error);
    exit();
}

?>