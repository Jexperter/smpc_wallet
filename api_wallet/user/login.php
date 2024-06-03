<?php
include 'C:\xampp\htdocs\api_wallet\connection.php';

// when sending/saving data to database //POST
// when retreiving/reading data from database //GET


$userEmail = $_POST['email'];
$userPassword = md5($_POST['password']);

$sqlQuery = "SELECT * FROM users WHERE email = '$userEmail' AND password = '$userPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery->num_rows > 0) { //user is allowed to login
    $userRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc()){
        $userRecord[] = $rowFound;
    }
    echo json_encode(
        array(
            "success"=>true,
            "userData"=>$userRecord[0],
        )
    );

}else { //not allowed
    echo json_encode(array("success"=>false));
}

?>
