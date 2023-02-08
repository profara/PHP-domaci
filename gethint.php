<?php
include("broker.php");

$query = "SELECT naslov FROM knjiga";
$knjige = $conn->query($query);

$q = $_REQUEST["q"];

$hint = "";


while ($a = mysqli_fetch_assoc($knjige)) {
    if ($q !== "") {
        $q = strtolower($q);
        $len = strlen($q);
        foreach ($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }
}

echo $hint === "" ? "no suggestion" : $hint;