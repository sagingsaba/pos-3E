<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gross Sales Summary</title>
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
    p {
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
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
      background-color: #45a049;
    }
  </style>
</head>
<!-- Link styled as a button -->
<a class="back-button" href="shift_menu.php">Back to shifts</a>
<body>
  <div class="container">
    <h1>Gross Sales Summary</h1>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Total Sales</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>April 1, 2024</td>
          <td>$500.00</td>
        </tr>
        <tr>
          <td>April 2, 2024</td>
          <td>$700.00</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</body>
</html>
