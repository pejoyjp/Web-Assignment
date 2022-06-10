<?php
$dsn = "mysql:host=localhost;dbname=gap";
$username = "root";
$password = "";

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.outlook.com";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = 'jinpeng8111765@outlook.com';
        $mail->Password = 'asd8111765';
        $mail->Subject="GAP Registration success";
        $mail->setFrom("jinpeng8111765@outlook.com");
        $mail->Body = "Congratulations on successfully registering with Galway Autism Partnership, your pass is ".$pwd;
        $mail->addAddress($userEmail);
        if($mail->Send()){
            echo "Email Sent!";
        }
        else{
            echo "Error..!";
        }
        $mail->smtpClose();




        include "payment.html";
    } catch (Exception $ex) {
//********************************************
    }

}