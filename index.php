<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <?php
        require "src/connexion.php";
        $donnees = $dbh->query("SELECT * FROM ALBUM");
        echo("<pre>");
        foreach ($donnees as $n) {
            print_r($n);
        }
        echo("<pre>");
    ?>
</body>
</html>