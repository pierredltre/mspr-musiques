<?php
    require "../src/connexion.php";
    $date = "20201117_1704";
    $versions = "migrations-versions.txt";
    
    if(!file_exists($versions) || strpos(file_get_contents($versions),$date) === false) {
        $sql = file_get_contents('migrations/' . $date . '.sql');

        $res = $dbh->exec($sql);
        if ($res === false) {
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
        }
        else {
            echo "Migration effectuée avec succès !";
            file_put_contents($versions, $date . "\n", FILE_APPEND);
        }
    }
    else {
        echo "Migration déjà effectuée !";
    }