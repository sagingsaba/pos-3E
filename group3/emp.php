<?php
require 'dbcon.php';
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    $data = $_SESSION['attendanceID'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/account.css">
    <title>Add Employee</title>
</head>

<body>

    <div class="navigator">
        <ul>
            <li><a href="home.php">Reports</a></li>
            <!-- Change "Accounts" to "Employees" and add dropdown -->
            <li class="dropdown">
                <a class="dropdown-btn active">Employees</a>
                <div class="dropdown-content">
                    <a href="account.php" class="active">Employee List</a>
                    <a href="access.php">Access Rights</a>
                    <a href="time.php">Timecards</a>
                    <a href="totalhour.php">Total Hours Worked</a>
                </div>
            </li>
            <!-- Add a logout button -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="right-align">
        <div>
            <b>
                <?php echo $_SESSION['username']; ?>
            </b><br>
            <b><small>Administrator</small></b>
        </div>
    </div>


    <div class="container">
        <h2>Add Employee</h2>
        <form action="crud/addemp.php" method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="Fullname" name="Fullname" required><br><br>

            <label for="role">Applied Role:</label>
            <select id="role" name="AppliedRole" required>
                <option value="">Select Role</option>
                <?php
                require 'dbcon.php'; // Include database connection file
                
                // Fetch roles from the accessright table
                $stmt = $pdo->query('SELECT name FROM accessright');
                $roles = $stmt->fetchAll(PDO::FETCH_COLUMN);

                // Output each role as an option in the select dropdown
                foreach ($roles as $role) {
                    echo "<option value=\"$role\">$role</option>";
                }
                ?>
            </select>

            <div class="form-group">
                <label for="application_date">Application Date:</label>
                <input type="date" id="Date" name="Date" value="<?php echo date('Y-m-d'); ?>" required readonly>
            </div>
            <button type="submit">Add Employee</button>
        </form>
    </div>

    <script src="js/nav.js"></script>
</body>

</html>