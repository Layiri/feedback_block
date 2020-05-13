<?php

// require ReCaptcha class
require('../libraries/recaptcha-master/src/autoload.php');

use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$advantages = $_POST['advantage'];
$disadvantages = $_POST['disadvantage'];

//$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
//$errorMessage = 'There was an error while submitting the form. Please try again later';
//
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
        if (!$response->isSuccess()) {
            throw new \Exception('ReCaptcha was not validated.');
        }

    } else {
        throw new \Exception('The feedback cann\'t be empty.');
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}
