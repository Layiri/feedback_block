<?php


//Connect to the MySQL database using the PDO object.
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');


$req = $pdo->prepare('INSERT INTO jeux_video(name,email,comment,rating,advantage,disadvantages,user_ip,user_agent,created_at) VALUES(:name, :email, :comment, :rating, :advantage, :disadvantages,user_ip,user_agent,created_at)');
$req->execute(array(
    'name' => $name,
    'email' => $email,
    'comment' => $comment,
    'rating' => $rating,
    'advantage' => $advantage,
    'disadvantages' => $disadvantages,
    'user_ip' => $user_ip,
    'user_agent' =>  $_SERVER['HTTP_USER_AGENT'],
    'created_at' => time(),
));

echo 'Le jeu a bien été ajouté !';
