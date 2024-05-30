<?php
require '../dbcon.php';

// Check if the IDs of the employees to delete are provided in the query string
if (!isset($_GET['ids'])) {
    // Redirect to a suitable error page or back to the main page
    header("Location: ../account.php");
    exit();
}

// Fetch the IDs of the employees to delete from the query string
$employeeIDs = explode(',', $_GET['ids']);

// Delete the selected employees from the database
try {
    // Prepare a SQL statement with placeholders for the IDs
    $sql = 'DELETE FROM emp WHERE userID IN (' . implode(',', array_fill(0, count($employeeIDs), '?')) . ')';
    $stmt = $pdo->prepare($sql);
    // Bind the employee IDs to the placeholders in the SQL statement
    $stmt->execute($employeeIDs);
    // Redirect to the main page after deletion
    header("Location: ../account.php");
    exit();
} catch (PDOException $e) {
    // Handle errors gracefully, you can customize this as per your needs
    echo "Error: " . $e->getMessage();
}
?>
