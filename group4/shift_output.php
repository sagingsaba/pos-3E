<?php
session_start();

// Check if shift data is stored in session
if (isset($_SESSION['shift_id']) && isset($_SESSION['cash_count'])) {
    $shift_id = $_SESSION['shift_id'];
    $cash_count = $_SESSION['cash_count'];
    // Output shift summary
    echo "<h2>Shift Summary</h2>";
    echo "<p>Shift ID: " . htmlspecialchars($shift_id) . "</p>";
    echo "<p>Cash Count: " . htmlspecialchars($cash_count) . "</p>";
    // Clear session data
    session_unset();
    session_destroy();
    
} else {
    // If session data is not set, redirect back to the form page
    header("Location: shift_summary.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a class="back-button" href="shift_menu.php">Return</a>
</body>
</html>
<style>
    /* Style for the button */
    .back-button {
      background-color: #ccc921; 
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    /* Hover effect */
    .back-button:hover {
      background-color: green;
    }
</style>

