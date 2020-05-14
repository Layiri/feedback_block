<?php

// require ReCaptcha class
require('../libraries/recaptcha-master/src/autoload.php');
require('../function/functions.php');

use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

$product_id = $_POST['product'];
$name = $_POST['name'];
$email = $_POST['email'];
$comment = strip_tags($_POST['comment']);
$rating = $_POST['rating'];
$advantages = strip_tags($_POST['advantage']);
$disadvantages = strip_tags($_POST['disadvantage']);
$user_ip = userIpAddr();
$user_agent = userAgent();
$file_path = saveFile();

// ReCaptch Secret TODO:: change in production
$recaptchaSecret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';

//TODO :: delete before send
error_reporting(E_ALL & ~E_NOTICE);

try {
    if (!empty($_POST)) {

        // validate the ReCaptcha, if something is wrong, we throw an Exception,
        // i.e. code stops executing and goes to catch() block

        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha is not set.');
        }

        $recaptcha = new ReCaptcha($recaptchaSecret, new CurlPost());

        // we validate the ReCaptcha field together with the user's IP address
        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

//        TODO::Uncomment
//        if (!$response->isSuccess()) {
//            throw new \Exception('ReCaptcha was not validated.');
//        }
        // save in the database
        if ((!@include_once('../models/FeedBack.php')) || !file_exists('../models/FeedBack.php')) {
            throw new Exception ('Something is wrong, please contact your webmaster');
        } else {
            require_once('../models/FeedBack.php');
            header("Location: ../views/product.php");
//            header("Location: shirts.php");
            exit();

        }
    } else {
        throw new \Exception('The feedback cann\'t be empty.');
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
    var_dump($responseArray);
    die;
}


