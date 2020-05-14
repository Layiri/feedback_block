<?php

include_once '../function/functions.php';
include_once '../function/connect_database.php';


$product_name = (isset($_GET['product'])) ? $_GET['product'] : false;
$author = (isset($_GET['author'])) ? $_GET['author'] : false;
$email = (isset($_GET['email'])) ? $_GET['email'] : false;
$comments = (isset($_GET['comments'])) ? $_GET['comments'] : false;
$ratings = (isset($_GET['ratings'])) ? $_GET['ratings'] : null;
$advantages = (isset($_GET['advantages'])) ? $_GET['advantages'] : '';
$disadvantages = (isset($_GET['disadvantages'])) ? $_GET['disadvantages'] : '';
$user_ip = userIpAddr();
$user_agent = userAgent();

if ($product_name) {

    $product = $conn->query("SELECT * FROM `products` AS `p` WHERE `p`.`name`='$product_name'")->fetch();

    if ($product) {

        if ($author && $email && $comments && $ratings && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $req = $conn->prepare('INSERT INTO otzivi(product_id,full_name,email,comments,ratings,advantages,disadvantagess,user_ips,user_agents,created_ats) VALUES(:product_id,:full_name, :email, :comments, :ratings, :advantages, :disadvantagess,:user_ips,:user_agents,:created_ats)');
            $req->execute(array(
                'product_id' => $product['id'],
                'full_name' => $author,
                'email' => $email,
                'comments' => $comments,
                'ratings' => $ratings,
                'advantages' => $advantages,
                'disadvantagess' => $disadvantages,
                'user_ips' => $user_ip,
                'user_agents' => $user_agent,
                'created_ats' => time(),
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
//    http://feedback.local/api/add_comment.php?product=&author=&email=&comments=&ratings=&advantages=&disadvantages=

        //    http://feedback.local/api/add_comment.php?product=1&author=efwfwfw&email=fewfe@ff.de&comments=ghcfghvyghvkhg&ratings=4&advantages=vgvh&disadvantages=hjgcgfhgsf

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

