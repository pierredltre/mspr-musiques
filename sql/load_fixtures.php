<?php
    require_once('../src/connexion.php');

    $sql = '';
    $fichiers = ["album.sql", "artiste.sql", "chanson.sql", "compose.sql", "ecrit.sql"];

    foreach ($fichiers as $fichier) {
        // ici on concatène toutes les requetes sql
        $sql .= "\n" . file_get_contents("./migrations/" . $fichier);
    }

    //$res = $dbh->exec($sql);
    try {
        $dbh->beginTransaction();

        $res = $dbh->exec($sql);

        $dbh->commit();
    } catch (Exception $e) {
        $dbh->rollback();
        throw $e;
    }

    if ($res === false) {
        echo "\nPDO::errorInfo():\n";
        print_r($dbh->errorInfo());
    } else {
        echo "Fixtures chargées avec succès !";
    }
?>