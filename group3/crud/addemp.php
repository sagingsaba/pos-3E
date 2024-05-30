<?php
require '../dbcon.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $fullname = $_POST['Fullname'];
        $role = $_POST['AppliedRole'];
        $application_date = $_POST['Date'];

        $stmt = $pdo->prepare('INSERT INTO emp (Fullname, AppliedRole, Date) VALUES (?, ?, ?)');
        
        $stmt->execute([$fullname, $role, $application_date]);

        header("Location: ../account.php");
        exit();
    } catch (PDOException $e) {
        header("Location: ../emp.php");
        exit();
    }
}
?>
