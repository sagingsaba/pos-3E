<?php
session_start();
require 'dbcon.php';

// Check if the user is logged in
if (isset($_SESSION['attendanceID'])) {
    try {
        // Get the attendance ID from the session
        $attendanceID = $_SESSION['attendanceID'];

        // Update the logout time for the corresponding attendance record
        $stmt = $pdo->prepare('UPDATE attendance SET clockOutTime = NOW() WHERE attendanceID = ? AND clockOutTime IS NULL');
        $stmt->execute([$attendanceID]);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    session_destroy();
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
