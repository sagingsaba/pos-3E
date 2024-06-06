
<?php
// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shift_id = $_POST['shift_id'];
    $cash_start = $_POST['cash_start'];
    
    // Validate and sanitize input (you can add more validation as needed)
    $shift_id = filter_var($shift_id, FILTER_SANITIZE_STRING);
    $cash_start = filter_var($cash_start, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Database connection parameters
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "clothing_sales";

    try {
        // Create a PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO shifts_output (shift_id, cash_start) VALUES (:shift_id, :cash_start)");
        
        // Bind parameters
        $stmt->bindParam(':shift_id', $shift_id);
        $stmt->bindParam(':cash_start', $cash_start);
        
        // Execute the statement
        $stmt->execute();
        
        echo "<h2>New shift started successfully! :D<h2>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    // Close connection
    $conn = null;
} else {
    echo "Error: Form data not received.";
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