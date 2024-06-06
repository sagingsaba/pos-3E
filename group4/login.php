
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #807373b4;
        }
        .header {
            background-color: #ccc921;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=password], input[type=submit] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #ccc921;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #a7a512;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Banana Grocery Store</h1>
    </div>
    <style>
        /* Style for the button */
        .back-button {
          background-color: green; /* Green */
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
          background-color: #ccc921;
        }
      </style>
    </head>
    <body>
    
    <!-- Link styled as a button -->
    <a class="back-button" href="signup.php">Back </a>
    
    </body>
    </html>
    <div class="container">
        <h2>Login</h2>
        <form action="index.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <a href="forgotpassword.php">Forgot Password</a>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

