<?php
$dsn = "mysql:host=localhost;dbname=gap";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
//set up error reporting on server
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $ex) {
//echo "Connection Failure Error is " . $ex->getMessage();
// redirect to an error page passing the error message
    header("Location:error.php?msg=" . $ex->getMessage());

}




$userFirstName = $_POST['userFirstName'];
$userSecondName = $_POST['userSecondName'];
$userEmail= $_POST['userEmail'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

if ($pwd == "")
{
    echo "please input correct details";
$result["result"] = "false";
}
else{


    $sql = "INSERT INTO user(userCode,userFirstName,userSecondName,userEmail,phone,pwd,dob,gender) VALUES('',:userFirstName,:userSecondName,:userEmail,:phone,:pwd,:dob,:gender)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userFirstName', $userFirstName);
    $stmt->bindValue(':userSecondName', $userSecondName);
    $stmt->bindValue(':userEmail', $userEmail);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':pwd', $pwd);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':gender', $gender);


    try {
        $stmt->execute();
    } catch (Exception $ex) {
//********************************************
    }

}