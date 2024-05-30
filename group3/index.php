<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="container">
        
        <h2>Login</h2>
        <?php if(isset($_GET['error']) && $_GET['error'] === 'invalid_credentials'): ?>
            <div class="error">Invalid username or password</div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="input-field" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="input-field" required>
            <input type="submit" value="Login" class="submit-btn">
        </form>
    </div>
</body>
</html>
