<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shift Management</title>
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
    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    input[type="text"] {
      width: calc(100% - 20px);
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }
    button[type="submit"] {
      padding: 10px 20px;
      background-color: #ccc921;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: green;
    }
  </style>
</head>
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
  <!-- Link styled as a button -->
<a class="back-button" href="shift_menu.php">Back to Shifts</a>
<body>
  <div class="container">
    <h1>Shift Management</h1>
    <form action="proccess_shift.php" method="post">
      <label for="shift_id">Shift ID:</label>
      <input type="text" id="shift_id" name="shift_id" required>
      <label for="cash_count">Cash Count:</label>
      <input type="text" id="cash_count" name="cash_count" required>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>

