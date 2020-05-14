<?php

include_once('../function/connect_database.php');


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