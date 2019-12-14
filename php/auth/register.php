<?php
//https://www.linode.com/docs/getting-started/
// https://www.twilio.com/docs/sms/quickstart/php#install-php-and-the-twilio-php-helper-library
// https://www.twilio.com/console
include("../config/config.php");
//API to handle user's registration
$check = mysqli_query($conn,"SELECT * FROM members WHERE EMAIL = '$_POST[email]'");

if(mysqli_num_rows($check) == 0){
    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $regTime = gmdate('Y-m-d G:i:s');
    
    $doc = $_FILES['documentName'];
    
    $time = gmdate('Y-m-d G:i:s');
    
    $lgE = base64_encode($doc['name']);
    
    $newFileName = time() . $lgE . $doc['name'];
    
    $profile = $_FILES['profileImage'];
    
    $pr = base64_encode($profile['name']);
    
    $newFileName1 = time() . $pr . $profile['name'];
    
    if (move_uploaded_file($doc['tmp_name'], "../../documents/$newFileName") or move_uploaded_file($profile['tmp_name'], "../../documents/$newFileName1")) {
        $create = mysqli_query(
            $conn,
            "INSERT INTO members 
        (
            FIRSTNAME,
            LASTNAME,
            EMAIL,
            PASSWORD,
            GENDER,
            PHONENUMBER,
            HOMEADDRESS,
            OFFICEADDRESS,
            CITY_STATE,
            COUNTRY,
            ACCOUNTYPE,
            UNIQUECODE,
            DOCUMENTTYPE,
            DOCUMENTNAME,
            PROFILEIMAGE,
            REGTIME,
            VERIFYACCOUNTID
        
        )   VALUES(
            
            '$_POST[firstName]',
            '$_POST[lastName]',
            '$_POST[email]',
            '$password',
            '$_POST[gender]',
            '$_POST[phoneNumber]',
            '$_POST[homeAddress]',
            '$_POST[officeAddress]',
            '$_POST[cityState]',
            '$_POST[country]',
            '$_POST[accountType]',
            '$_POST[uniqueCode]',
            '$_POST[documentType]',
            '$newFileName',
            '$newFileName1',
            '$regTime',
            1
            )"
        );

        if ($create) {
            $res = array("type" => "registration", "response" => "success", "email" => $_POST['email'], "status" => 200);
            http_response_code(200);

            echo json_encode($res);
        } else {
            $res = array("type" => "registration", "response" => "failed", "email" => $_POST['email'], "status" => 400);
            http_response_code(400);

            echo json_encode($res);
        }
    }else{
        $res = array("type" => "registration", "response" => "invalid_doc", "email" => $_POST['email'], "status" => 403);
        
        http_response_code(400);

        echo json_encode($res);
    }


}else{
    
    $res = array("type" => "registration", "response" => "existing_account", "email" => $_POST['email'], "status" => 400);
    http_response_code(404);
    echo json_encode($res);

}
?>