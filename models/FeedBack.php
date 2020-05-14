<?php
include_once '../function/connect_database.php';

$req = $conn->prepare('INSERT INTO otzivi(product_id,full_name,email,comment,ratings,advantages,disadvantages,user_ip,user_agent,file_path,created_at) VALUES(:product_id, :full_name, :email, :comment, :ratings, :advantages, :disadvantages, :user_ip, :user_agent, :file_path, :created_at)');
$req->execute(array(
    'product_id' => $product_id,
    'full_name' => $name,
    'email' => $email,
    'comment' => $comment,
    'ratings' => $rating,
    'advantages' => $advantages,
    'disadvantages' => $disadvantages,
    'user_ip' => $user_ip,
    'user_agent' => $user_agent,
    'file_path' => $file_path,
    'created_at' => time(),
));
