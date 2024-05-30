<?php
require_once '../include/dbcon.php';
session_start();

if (!isset($_SESSION["Email"])) {
    header("location:../login.php");
    exit; 
}

if (!isset($_GET['id'])) {
    header("location:customers.php");
    exit;
}

$customerId = $_GET['id'];

try {

    $pdoQuery = "SELECT * FROM customer_account WHERE id=:id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute(['id' => $customerId]);
    $customerHistory = $pdoResult->fetch();
    

    if (!$customerHistory) {
        header("location: customers.php");
        exit;
    }
} catch (PDOException $error) {
    echo $error->getMessage();
    exit; 
}
?>