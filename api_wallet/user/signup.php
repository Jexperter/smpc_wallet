<?php
include 'C:\xampp\htdocs\api_wallet\connection.php';

// when sending/saving data to database //POST
// when retreiving/reading data from database //GET


$userEmail = $_POST['email'];
$userPassword = md5($_POST['password']);
$sharePK = ($_POST['shareofprivatekey']);//(add md5 later when finally finished)
$publicKey = $_POST['public_key'];

$sqlQuery = "INSERT INTO users SET email = '$userEmail', password = '$userPassword', shareofprivatekey = '$sharePK', public_key = '$publicKey' ";


$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    echo json_encode(array("success"=>true));
}else {
    echo json_encode(array("success"=>false));
}

?>
