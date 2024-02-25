<?php

include('dbConfig/database.php');

function save($pseudo, $message) {
    $oMysqli = getDatabaseConnection();

    $sQuery = "INSERT INTO messages (pseudo, message) VALUES (?, ?)";
    $stmt = $oMysqli->prepare($sQuery);
    $stmt->bind_param("ss", $pseudo, $message);
    $aResult = $stmt->execute();

    header('Content-Type: application/json');
    echo json_encode(['success' => $aResult]);
}

function get() {
    $oMysqli = getDatabaseConnection();

    $sQuery = "SELECT * FROM messages";
    $oResult = $oMysqli->query($sQuery);

    $aData = [];
    while ($row = $oResult->fetch_assoc()) {
        $aData[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($aData);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    get();
} elseif ($method == 'POST') {
    $aData = json_decode(file_get_contents('php://input'), true);
    if (!isset($aData['pseudo']) || !isset($aData['message'])) {
        header('HTTP/1.1 400 Bad Request');
        exit('Invalid data');
    }

    save($aData['pseudo'], $aData['message']);
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Method Not Allowed';
}
