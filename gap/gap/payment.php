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




$cardHolder = $_POST['cardHolder'];
$cardNumber = $_POST['cardNumber'];
$expiryDate= $_POST['expiryDate'];


if ($expiryDate == "")
{
    echo "please input correct details";
    $result["result"] = "false";
}
else{


    $sql = "INSERT INTO payment(cardHolder,cardNumber,expiryDate) VALUES(:cardHolder,:cardNumber,:expiryDate)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cardHolder', $cardHolder);
    $stmt->bindValue(':cardNumber', $cardNumber);
    $stmt->bindValue(':expiryDate', $expiryDate);



    try {
        $stmt->execute();
        echo "payment successful!! :)";
    } catch (Exception $ex) {
//********************************************
    }

}