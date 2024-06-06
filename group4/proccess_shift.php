<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shift_id = $_POST['shift_id'];
    $cash_count = $_POST['cash_count'];
    
    // Perform any processing here, such as storing the data in a database
    // For demonstration, let's just store the data in session and redirect
    session_start();
    $_SESSION['shift_id'] = $shift_id;
    $_SESSION['cash_count'] = $cash_count;
    
    // Redirect to shift_summary.php
    header("Location: shift_output.php");
    exit();
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: shift_summary.php");
    exit();
}
?>