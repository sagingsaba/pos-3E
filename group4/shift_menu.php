<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shift Menu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }
    h1 {
      margin-top: 0;
      color: #333;
    }
    ul {
      list-style-type: none;
      padding: 0;
    }
    li {
      margin-bottom: 10px;
    }
    a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    a:hover {
      color: #4CAF50;
    }
    header {
    background-color: #ccc921;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}
  </style>
  </head>
  <header>
    <h1>Shifts Menu</h1>
  </header>
 
</style>
<style>
    /* Style for the button */
    .back-button {
      background-color: #ccc921; /* Green */
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
      background-color: #a7a512;
    }
  </style>
  <!-- Link styled as a button -->
<a class="back-button" href="index.php">Back to Dashboard</a>
<body>
  <div class="container">
    <h1>Shift Menu</h1>
    <ul>
      <li><a href="shiftnew.php">Start New Shift</a></li>
      <li><a href="shift_summary.php">View Shift Summary</a></li>
      <li><a href="shift_history.php">View Shift History</a></li>
      <li><a href="Gross_Sales_Summary.php">Gross Sales Summary</a></li>
      <li><a href="shift_receipt.php">Shift Receipt</a></li>
    
    </ul>
  </div>
</body>
</html>