<?php
//https://www.linode.com/docs/getting-started/
// https://www.twilio.com/docs/sms/quickstart/php#install-php-and-the-twilio-php-helper-library
// https://www.twilio.com/console
include("../config/config.php");
//API to handle user's signin
$check = mysqli_query($conn,"SELECT * FROM members WHERE EMAIL = '$_POST[email]'");

if (mysqli_num_rows($check) > 0) {
    $check = mysqli_fetch_array($check);

    if (password_verify($_POST['password'], $check['PASSWORD'])) {
        $res = array("type" => "signin", "response" => "success", "email" => $_POST['email'], "status" => 200,"uniqueCode" => $check['UNIQUECODE']);
        http_response_code(200);

        echo json_encode($res);
    } else {
            $res = array("type" => "signin", "response" => "incorrect", "email" => $_POST['email'], "status" => 400);
            http_response_code(400);

            echo json_encode($res);
        }
    }
    else{
        $res = array("type" => "signin", "response" => "incorrect", "email" => $_POST['email'], "status" => 403);
        
        http_response_code(400);

        echo json_encode($res);
}
?>