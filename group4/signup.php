<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="styles.css">
</head>
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
    background-color:#ccc921;
  }
</style>
</head>
<body>

<!-- Link styled as a button -->
<a class="back-button" href="home.php">Back</a>

</body>
</html>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #3a353550;
  
}

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color:white;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(10, 10, 10, 0.644);
}

h1 {
  text-align: center;
}

.form-container {
  display: flex;
  flex-direction: column;
}

.form-container form {
  margin-bottom: 20px;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #ccc921;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #a7a512;
}
</style>
<body>
  <div class="container">
    <h1>Welcome to Banana Grocery Store!</h1>
    <div class="form-container">
      <form id="signup-form" action="login.php" method="POST">
        <h2>Sign Up</h2>
        <div class="form-group">
          <label for="fullname">Full Name:</label>
          <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
          <a href="login.php">Already Sign In</a>
        </div>
        <button type="submit"><h3>Sign Up</h3></button>
     
    </div>
  </div>
</body>
</html>

