<?php

function getDatabaseConnection() {
    $servername = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_NAME');

    $oMysqli = new mysqli($servername, $username, $password, $dbname);

    if ($oMysqli->connect_error) {
        die("Connection failed: " . $oMysqli->connect_error);
    }

    return $oMysqli;
}

