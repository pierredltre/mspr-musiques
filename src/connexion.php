<?php
$dbh = new PDO('mysql:host=localhost;dbname=mspr;charset=utf8mb4', 'mspr', 'msprmusique');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>