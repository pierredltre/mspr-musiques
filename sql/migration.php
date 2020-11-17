<?php
require_once "../src/connexion.php";
$sql = file_get_contents('migrations/20201117_1704.sql');
$res = $dbh->exec($sql);

if (!$res) {
    echo "\nPDO::errorInfo():\n";
    print_r($dbh->errorInfo());
}
?>