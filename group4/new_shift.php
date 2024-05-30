<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Start New Shift</title>
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
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Start New Shift</h1>
    <form action="process_new_shift.php" method="post">
      <label for="shift_id">Shift ID:</label>
      <input type="text" id="shift_id" name="shift_id" required>
      <label for="cash_start">Starting Cash:</label>
      <input type="text" id="cash_start" name="cash_start" required>
      <button type="submit">Start Shift</button>
    </form>
  </div>
</body>
</html>