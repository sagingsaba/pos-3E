<?php
require '../dbcon.php';
session_start();

// Check if the employee ID is provided
if (!isset($_GET['id'])) {
    // Redirect to a suitable error page or back to the main page
    header("Location: ../edit.php");
    exit();
}

// Fetch the employee details from the database based on the provided ID
try {
    $stmt = $pdo->prepare('SELECT * FROM emp WHERE userID = ?');
    $stmt->execute([$_GET['id']]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the employee exists
    if (!$employee) {
        // Redirect to a suitable error page or back to the main page
        header("Location: ../account.php");
        exit();
    }
} catch (PDOException $e) {
    // Redirect to an error page or back to the main page with an error message
    header("Location: ../error.php?message=" . urlencode($e->getMessage()));
    exit();
}

// Check if the form is submitted for updating the employee
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Process update here
    try {
        $fullname = $_POST['fullname'];
        $appliedRole = $_POST['applied_role'];
        $date = $_POST['date'];
        
        $stmt = $pdo->prepare('UPDATE emp SET Fullname = ?, AppliedRole = ?, Date = ? WHERE userID = ?');
        $stmt->execute([$fullname, $appliedRole, $date, $_GET['id']]);
        // Redirect to a suitable page after successful update
        header("Location: ../account.php");
        exit();
    } catch (PDOException $e) {
        // Redirect to an error page or back to the main page with an error message
        header("Location: ../error.php?message=" . urlencode($e->getMessage()));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/account.css">
    <title>Update Employee</title>
</head>

<body>
<div class="navigator">
        <ul>
            <li><a href="../home.php">Reports</a></li>
            <!-- Change "Accounts" to "Employees" and add dropdown -->
            <li class="dropdown">
                <a class="dropdown-btn active">Employees</a>
                <div class="dropdown-content">
                    <a href="../account.php" class="active">Employee List</a>
                    <a href="../access.php">Access Rights</a>
                    <a href="../time.php">Timecards</a>
                    <a href="../totalhour.php">Total Hours Worked</a>
                </div>
            </li>
            <!-- Add a logout button -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="right-align">
        <div>
            <b><?php echo $_SESSION['username']; ?></b><br>
            <b><small>Administrator</small></b>
        </div>
    </div>

    <div class="container">
        <h2>Update Employee</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $employee['userID']; ?>">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $employee['Fullname']; ?>">
            <label for="applied_role">Applied Role:</label>
            <select id="applied_role" name="applied_role">
                <option value="Administrator" <?php if ($employee['AppliedRole'] == 'Administrator') echo 'selected'; ?>>Administrator</option>
                <option value="Manager" <?php if ($employee['AppliedRole'] == 'Manager') echo 'selected'; ?>>Manager</option>
                <option value="Cashier" <?php if ($employee['AppliedRole'] == 'Cashier') echo 'selected'; ?>>Cashier</option>
            </select>
            <label for="date">Application Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $employee['Date']; ?>" readonly>
            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script src="..js/nav.js"></script>

</body>

</html>
