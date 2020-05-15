<?php

include_once '../helpers/Functions.php';
include_once('../helpers/ConnectDatabase.php');
include_once '../config/config.php';

$conn = ConnectDatabase::connectDb($config);


$id = (isset($_GET['id'])) ? $_GET['id'] : false;
$product_name = (isset($_GET['product'])) ? $_GET['product'] : false;
$author = (isset($_GET['author'])) ? $_GET['author'] : false;
$email = (isset($_GET['email'])) ? $_GET['email'] : false;
$comments = (isset($_GET['comments'])) ? $_GET['comments'] : false;
$ratings = (isset($_GET['ratings'])) ? $_GET['ratings'] : null;
$advantages = (isset($_GET['advantages'])) ? $_GET['advantages'] : '';
$disadvantages = (isset($_GET['disadvantages'])) ? $_GET['disadvantages'] : '';
$file_path = (isset($_GET['file_path'])) ? $_GET['file_path'] : '';
$user_ip = Functions::userIpAddr();
$user_agent = Functions::userAgent();

if ($product_name) {

    $product = $conn->query("SELECT * FROM `products` AS `p` WHERE `p`.`name` LIKE '%$product_name%'")->fetch();

    if ($product) {
        if ($id && $author && $email && $comments && is_numeric($ratings) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $req = $conn->prepare('UPDATE `otzivi` SET product_id = :product_id, full_name = :full_name, email = :email, comment = :comment, ratings = :ratings, advantages = :advantages, disadvantages = :disadvantages, user_ip = :user_ip, user_agent = :user_agent, file_path = :file_path, created_at = :created_at');
            $req->execute(array(
                'product_id' => $product['id'],
                'full_name' => $author,
                'email' => $email,
                'comment' => $comments,
                'ratings' => $ratings,
                'advantages' => $advantages,
                'disadvantages' => $disadvantages,
                'user_ip' => $user_ip,
                'user_agent' => $user_agent,
                'file_path' => $file_path,
                'created_at' => time(),
            ));


            header('Content-Type: application/json');
            echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);

        } else {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'These params are required : author, email, comments, ratings'
            ], JSON_UNESCAPED_UNICODE);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'This product does\'nt exist'
        ], JSON_UNESCAPED_UNICODE);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'This product does\'nt exist'
    ], JSON_UNESCAPED_UNICODE);
}

