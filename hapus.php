<?php

include "database.php";

$id = $_GET['id']; 

try {
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->query("delete from city where ID=$id; ");
} catch (Exception $e) {
    echo $e->getMessage();
}

header('location:index.php');

?>