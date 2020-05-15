<?php
include_once('../helpers/ConnectDatabase.php');
include_once '../config/config.php';

$conn = ConnectDatabase::connectDb($config);


$comments = $conn->query('SELECT * FROM `otzivi`')->fetchAll();
$comments_api = [];
$i = 1;
foreach ($comments as $comment) {
    $product = $conn->query('SELECT * FROM `products` WHERE `id`=' . $comment['product_id'])->fetch();
    $comments_api[$i] = [
        'id' => $comment['id'],
        'product' => $product['name'],
        'author' => $comment['full_name'],
        'email' => $comment['email'],
        'comment' => $comment['comment'],
        'ratings' => $comment['ratings'],
        'advantages' => $comment['advantages'],
        'disadvantages' => $comment['disadvantages'],
        'user_ip' => $comment['user_ip'],
        'user_agent' => $comment['user_agent'],
        'file_path' => $comment['file_path'],
        'created_date' => date('m/d/Y', $comment['created_at']),
    ];
    $i++;
}
header('Content-Type: application/json');
echo json_encode($comments_api, JSON_UNESCAPED_UNICODE);