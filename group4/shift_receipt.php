<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shift Receipt</title>
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
</head>
<style>
    /* Style for the button */
    .back-button {
      background-color: #ccc921;
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
      background-color: green;
    }

    
  </style>
  <!-- Link styled as a button -->
<a class="back-button" href="shift_menu.php">Back to Shifts</a>
<body>
  <div class="container">
    <h1>Shift Receipt</h1>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Harvest Banana</td>
          <td>2</td>
          <td>$3.98</td>
        </tr>
        <tr>
          <td>Tinola Cut</td>
          <td>1</td>
          <td>$1.49</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
    <p>Total Cash: $50.00</p>
    <p>Cashier: Florence Hicban</p>
    <p>Date: April 30, 2024</p>
    <button class="print-button" onclick="window.print()">Print Receipt</button>
    <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Purefoods Crazy Cut Nuggets</td>
            <td>2</td>
            <td>$8.98</td>
          </tr>
          <tr>
            <td>Magnolia Chicken Drumstick</td>
            <td>1</td>
            <td>$7.49</td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
      <p>Total Cash: $50.00</p>
      <p>Cashier: Mark Anthony Pasco</p>
      <p>Date: April 15, 2024</p>
      <button class="print-button" onclick="window.print()">Print Receipt</button>
         
   
  </div>
</body>
</html>
  </div>
</body>
</html>