<?php

include ('src/dbConfig/database.php');

$oMysqli = getDatabaseConnection();
try {
    $sQuery = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        pseudo VARCHAR(255) NOT NULL,
        message TEXT NOT NULL
    )";

    $oMysqli->query($sQuery);

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    $oMysqli->close();
}
