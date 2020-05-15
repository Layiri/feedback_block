<?php

include_once '../helpers/ConnectDatabase.php';
include_once '../config/config.php';

$conn = ConnectDatabase::connectDb($config);

$authors = $conn->query('SELECT * FROM `otzivi`')->fetchAll();
$authors_api = [];
$i = 1;
foreach ($authors as $author) {
    $authors_api[$i] = [
        'author' => $author['full_name'],
    ];
    $i++;
}
header('Content-Type: application/json');
echo json_encode($authors_api, JSON_UNESCAPED_UNICODE);