<?php
include("config/config.php");
//API to handle user's signin
$json = file_get_contents('php://input');
$data = json_decode($json);

$email = $data->email;

$uniqueCode = $data->uniqueCode;

$check = mysqli_query($conn,"SELECT * FROM members WHERE EMAIL = '$email' AND UNIQUECODE = '$uniqueCode'");

if (mysqli_num_rows($check) > 0) {
    $check = mysqli_fetch_array($check);

        $res = array(
            "type" => "fetchDetails", 
            "response" => "success", 
            "email" => $email, 
            "status" => 200,
            "uniqueCode" => $check['UNIQUECODE'],
            "firstName" => $check['FIRSTNAME'],
            "lastName" => $check['LASTNAME'],
            "gender" => $check['GENDER'],
            "phoneNumber" => $check['PHONENUMBER'],
            "verifyPhoneId" => $check['VERIFYPHONEID'],
            "verifiedPhone" => $check['VERIFIEDPHONE'],
            "homeAddress" => $check['HOMEADDRESS'],
            "officeAddress" => $check['OFFICEADDRESS'],
            "cityState" => $check['CITY_STATE'],
            "country" => $check['COUNTRY'],
            "accountType" => $check['ACCOUNTYPE'],
            "documentType" => $check['DOCUMENTTYPE'],
            "documentName" => $check['DOCUMENTNAME'],
            "verifiedDocument" => $check['VERIFIEDDOCUMENT'],
            "profileImage" => $check['PROFILEIMAGE'],
            "verifiedAccount" => $check['VERIFIEDACCOUNT'],
            "admin" => $check['ADMIN']
        );
        http_response_code(200);

        echo json_encode($res);
    } 
    else{
        $res = array("type" => "fetchDetails", "response" => "Not_Found", "email" => $email, "status" => 404);
        
        http_response_code(400);

        echo json_encode($res);
}
?>