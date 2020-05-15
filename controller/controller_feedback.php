<?php

require_once('../helpers/Functions.php');
require_once('../helpers/UploadFiles.php');
require_once('../models/FeedBack.php');
include_once '../helpers/ConnectDatabase.php';
include_once '../config/config.php';


$conn = ConnectDatabase::connectDb($config);

$product_id = $_POST['product'];
$name = $_POST['name'];
$email = $_POST['email'];
$comment = strip_tags($_POST['comment']);
$rating = $_POST['rating'];
$advantages = strip_tags($_POST['advantage']);
$disadvantages = strip_tags($_POST['disadvantage']);
$user_ip = Functions::userIpAddr();
$user_agent = Functions::userAgent();
$file_path = UploadFiles::saveFile();

try {
    if (!empty($_POST)) {

//         save in the database
        $saveFeedback = new FeedBack($conn);

        $saveFeedback->product_id = $product_id;
        $saveFeedback->full_name = $name;
        $saveFeedback->email = $email;
        $saveFeedback->comment = $comment;
        $saveFeedback->ratings = $rating;
        $saveFeedback->advantages = $advantages;
        $saveFeedback->disadvantages = $disadvantages;
        $saveFeedback->user_ip = $user_ip;
        $saveFeedback->user_agent = $user_agent;
        $saveFeedback->file_path = $file_path;

        if ($saveFeedback->save()) {
            header("Location: ../index.php");
            exit();
        } else {
            throw new Exception ('Something is wrong, please contact your webmaster');
        }
    } else {
        throw new \Exception('The feedback cann\'t be empty.');
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
    var_dump($responseArray);
    die;
}