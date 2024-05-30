User
<?php
require 'dbcon.php';
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to the home page if the user is already logged in
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password']; // Assuming the password is submitted via POST

        // Prepare SQL statement to fetch user data
        $stmt = $pdo->prepare('SELECT userID, password FROM usercredential WHERE username = ?');

        // Execute the statement
        $stmt->execute([$username]);

        // Fetch user data
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            // Verify the password
            if (password_verify($password, $userData['password'])) {
                // Set session variables for username and userID
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userData['userID'];

                // Insert attendance record for login (clock-in)
                $stmt = $pdo->prepare('INSERT INTO Attendance (userID, clockInTime) VALUES (?, NOW())');
                $stmt->execute([$userData['userID']]);

                // Get the ID of the last inserted record
                $attendanceID = $pdo->lastInsertId();

                // Store the attendance ID in the session
                $_SESSION['attendanceID'] = $attendanceID;

                // Redirect to home page
                header("Location: home.php");
                exit();
            } else {
                // Password does not match
                header("Location: index.php?error=incorrect_password");
                exit();
            }
        } else {
            // User does not exist
            header("Location: index.php?error=user_not_found");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>