<?php
$db = new PDO('mysql:host=localhost;dbname=mspr;charset=utf8mb4', 'mspr', 'msprmusique');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>