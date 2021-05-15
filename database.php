<?php
try {
    $database = new PDO('mysql:host=localhost;dbname=world', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>