<?php

$bytes = random_bytes(30);
$token = bin2hex($bytes);

header('Content-Type: application/json');
echo json_encode(['token' => $token], JSON_UNESCAPED_UNICODE);
