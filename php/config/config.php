<?php
function DBCONNECTION() //connect to the DB
{
    $server = 'localhost';
    $user = 'root';
    $password = 'adebomi';
    $connName = 'food_delivery';
    $port = 8080;
    global $conn;
    $conn = mysqli_connect($server,$user,$password,$connName,$port);
     if($conn) {
            return 'CONNECTION MADE';
            return '<p>Connection OK '. $conn->host_info.'</p>';
            return '<p>Server '.$conn->server_info.'</p>';
     } else {
            die('CONNECTION REFUSED,PLEASE CHECK CONNECTION INFO WELL'. mysqli_connect_error());
            die('Connect Error (' . $conn->connect_errno . ') '
                . $conn->connect_error);
     }
}
$x = DBCONNECTION();
function MEMBERS($conn)
{  
    $table = "CREATE TABLE if not exists members(
    id INT(11) AUTO_INCREMENT,
    FIRSTNAME VARCHAR(255) NOT NULL,
    LASTNAME VARCHAR(255) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    PASSWORD VARCHAR(255)  NULL,
    GENDER VARCHAR(255) NULL,
    PHONENUMBER VARCHAR(255) NULL,
    VERIFYPHONEID VARCHAR(255) NULL,
    VERIFIEDPHONE VARCHAR(255) NULL,
    HOMEADDRESS VARCHAR(255) NULL,
    OFFICEADDRESS VARCHAR(255) NULL,
    CITY_STATE VARCHAR(255) NULL,
    COUNTRY VARCHAR(255) NULL,
    ACCOUNTYPE VARCHAR(255) NULL,
    UNIQUECODE VARCHAR(255) NULL,
    DOCUMENTTYPE VARCHAR(255) NULL,
    DOCUMENTNAME VARCHAR(255) NULL,
    VERIFIEDDOCUMENT INT NULL,
    PROFILEIMAGE VARCHAR(255) NULL,
    REGTIME TIMESTAMP  NULL,
    VERIFYACCOUNTID VARCHAR(255) NULL,
    VERIFIEDACCOUNT INT NULL,
    ADMIN INT NULL,

    PRIMARY KEY(id)
    )";
    if(mysqli_query($conn,$table)) {
        return 'TABLE SUCCESSFULLY CREATED FOR MEMBERS';
    } else {
        return 'TABLE UNSUCCESSFULLY CREATED for MEMBERS';
    }
}
MEMBERS($conn);
// function PRODUCTS($conn)
// {  
//     $table = "CREATE TABLE if not exists products(
//     id INT(11) AUTO_INCREMENT,
//     PRODUCTNAME VARCHAR(255) NOT NULL,
//     FILESIZE VARCHAR(255) NOT NULL,
//     UPLOADER VARCHAR(255) NOT NULL,
//     FILENAME VARCHAR(255)  NULL,
//     FILETYPE VARCHAR(255) NULL,
//     UPLOADTIME TIMESTAMP  NULL,
//     PRICE VARCHAR(255)  NULL,
//     PRODUCTID VARCHAR(255) NOT NULL,
//     PRIMARY KEY(id)
//     )";
//     if(mysqli_query($conn,$table)) {
//         return 'TABLE SUCCESSFULLY CREATED FOR PRODUCTS';
//     } else {
//         return 'TABLE UNSUCCESSFULLY CREATED for PODUCTS';
//     }
// }
// PRODUCTS($conn);
// function CARDS($conn)
// {  
//     $table = "CREATE TABLE if not exists cards(
//     id INT(11) AUTO_INCREMENT,
//     FIRSTNAME VARCHAR(255) NOT NULL,
//     LASTNAME VARCHAR(255) NOT NULL,
//     CARDNAME VARCHAR(255) NOT NULL,
//     EMAIL VARCHAR(255) NOT NULL,
//     CVV INT NOT NULL,
//     CARDNO VARCHAR(255) NOT NULL,
//     EXPTIME VARCHAR(255) NOT NULL,
//     ACCOUNTNO VARCHAR(255) NULL,
//     PHONENUMBER VARCHAR(255) NULL,
//     HOMEADDRESS VARCHAR(255) NULL,
//     CONTACTADDRESS VARCHAR(255) NULL,
//     ZIP VARCHAR(255) NULL,
//     REGTIME TIMESTAMP  NULL,

//     PRIMARY KEY(id)
//     )";
//     if(mysqli_query($conn,$table)) {
//         return 'TABLE SUCCESSFULLY CREATED FOR CARDS';
//     } else {
//         return 'TABLE UNSUCCESSFULLY CREATED for CARDS';
//     }
// }
// CARDS($conn);
// function MY_CART($conn)
// {  
//     $table = "CREATE TABLE if not exists my_cart(
//     id INT(11) AUTO_INCREMENT,
//     PRODUCTID VARCHAR(255) NOT NULL,
//     CARTTIME TIMESTAMP  NULL,
//     TOTALPRICE VARCHAR(255)  NULL,
//     EMAIL VARCHAR(255) NOT NULL,
//     QUANTITY INT NULL,
//     CARTID VARCHAR(255) NOT NULL,
//     PRIMARY KEY(id)
//     )";
//     if(mysqli_query($conn,$table)) {
//         return 'TABLE SUCCESSFULLY CREATED FOR MY_CART';
//     } else {
//         return 'TABLE UNSUCCESSFULLY CREATED for MY_CART';
//     }
// }
// MY_CART($conn);
// function MY_ORDERS($conn)
// {  
//     $table = "CREATE TABLE if not exists my_orders(
//     id INT(11) AUTO_INCREMENT,
//     PRODUCTID VARCHAR(255) NOT NULL,
//     ORDERID VARCHAR(255) NOT NULL,
//     ORDERTIME TIMESTAMP  NULL,
//     SUBTOTAL VARCHAR(255)  NULL,
//     EMAIL VARCHAR(255) NOT NULL,
//     PHONENUMBER VARCHAR(255) NULL,
//     HOMEADDRESS VARCHAR(255) NULL,
//     CITY VARCHAR(255) NULL,
//     COUNTRY VARCHAR(255) NULL,
//     COMPANYNAME VARCHAR(255) NULL,
//     DELIVERYADDRESS VARCHAR(255) NOT NULL,
//     ZIP VARCHAR(255) NULL,
//     QUANTITY INT NULL,
//     CONFIRMATION INT NULL,
//     PAID INT NULL,
//     PRIMARY KEY(id)
//     )";
//     if(mysqli_query($conn,$table)) {
//         return 'TABLE SUCCESSFULLY CREATED FOR MY_ORDERS';
//     } else {
//         return 'TABLE UNSUCCESSFULLY CREATED for MY_ORDERS';
//     }
// }
// MY_ORDERS($conn);
?>