<?php

if (isset($_GET['id'])) {

    if (!empty($_GET['id'])) {

        include_once('../function/connect_database.php');
        $id = $_GET['id'];
        
        $comments = $conn->query("SELECT * FROM `otzivi` WHERE `id`='$id'")->fetchAll();
        $comments_api = [];
        $i = 1;
        foreach ($comments as $comment) {
            $product = $conn->query('SELECT * FROM `products` WHERE `id`=' . $comment['product_id'])->fetch();
            $comments_api[$i] = [
                'id' => $comment['id'],
                'product' => $product['name'],
                'author' => $comment['full_name'],
                'email' => $comment['email'],
                'comments' => $comment['comments'],
                'ratings' => $comment['ratings'],
                'advantages' => $comment['advantages'],
                'disadvantages' => $comment['disadvantagess'],
                'user_ip' => $comment['user_ips'],
                'user_agent' => $comment['user_agents'],
                'created_date' => date('m/d/Y', $comment['created_ats']),
            ];
            $i++;
        }
        header('Content-Type: application/json');
        echo json_encode($comments_api, JSON_UNESCAPED_UNICODE);


    } else {
        header('Content-Type: application/json');
        echo json_encode(['error'], JSON_UNESCAPED_UNICODE);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error'], JSON_UNESCAPED_UNICODE);
}