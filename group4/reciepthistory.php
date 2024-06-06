<!DOCTYPE html>
<html>
<head>
    <title>Receipt History - Clothing Line Sales Analytics</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<header>
<h1>Receipt History</h1>
</header>
<style>
    /* Style for the button */
    .back-button {
      background-color: #4CAF50; /* Green */
      border: none;
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
      background-color: #45a049;
    }
  </style>
</head>
<body>

<!-- Link styled as a button -->
<a class="back-button" href="index.php">Back to Dashboard</a>

</body>
</html>
<style>
.button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #007bff; /* Blue color */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    border-radius: 5px;
}

.button:hover {
    background-color: red; 
}

table {
    border-collapse: collapse;
    width: 100%; 
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

th {
    background-color: grey;
}
header {
    background-color: #ccc921;
    color: black;
    padding: 20px;
    text-align: center;
}

    </style>
<body>
    
    <h1>Receipt History - Banana Grocery Products</h1>
    

    <?php
    // Your PHP code to retrieve receipt history data goes here
    // For demonstration purposes, let's assume you have an array of receipt history data
    $receipt_history = array(
        array("Products Purchased", "Date", "Total Amount", "Status"),
        array("Choice Harvest Banana", "2024-04-15", "$150.00", "Paid"),
        array("Chicken Breast Fillet", "2024-04-16", "$200.00", "Paid"),
        array("Hotdog Cheesedog", "2024-04-17", "$180.00", "Pending")
    );

    // Display receipt history in a table
    echo "<table>";
    foreach ($receipt_history as $receipt) {
        echo "<tr>";
        foreach ($receipt as $value) {
            echo "<td>" . $value . "</td>";
        }
        // Adding a button for each receipt
        echo "<td><a href='view_receipt.php' class='button'>View Receipt</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>


</body>
</html>