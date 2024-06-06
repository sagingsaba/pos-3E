<?php
require 'dbcon.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}

// Initialize $timecards as an empty array
$timecards = [];
$totalHours = 0; // Initialize total hours counter

// Fetch data from the timecards table along with employee names, store, and total hours worked
try {
    $stmt = $pdo->query('SELECT e.Fullname, LOWER(t.store) AS store, 
                                ROUND(SUM(TIMESTAMPDIFF(MINUTE, t.clockIn, t.clockOut)) / 60, 2) AS totalHours 
                         FROM timecards t
                         INNER JOIN emp e ON t.employeeID = e.userID
                         GROUP BY e.Fullname');
    $timecards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total hours worked by all employees
    foreach ($timecards as $timecard) {
        $totalHours += $timecard['totalHours'];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/account.css">
    <style>
        .table-wrapper {
            max-height: 300px;
            /* Set max height for the table wrapper */
            overflow-y: auto;
            /* Add vertical scrollbar when content exceeds max height */
        }
    </style>
    <title>HR Accounts</title>
</head>

<body>

<div class="navigator">
        <ul>
            <li><a href="home.php">Reports</a></li>
            <!-- Change "Accounts" to "Employees" and add dropdown -->
            <li class="dropdown">
                <a class="dropdown-btn active">Employees</a>
                <div class="dropdown-content">
                    <a href="account.php">Employee List</a>
                    <a href="access.php">Access Rights</a>
                    <a href="time.php">Timecards</a>
                    <a href="totalhour.php" class="active">Total Hours Worked</a>
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
        <div class="header">
            <h2>Total Hours Worked</h2>
        </div>

        <div class="table-wrapper">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th class="align-left">Employee</th>
                            <th class="align-left">Store</th>
                            <th class="align-left">Total hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($timecards as $timecard): ?>
                            <tr>
                                <td>
                                    <?php echo $timecard['Fullname']; ?>
                                </td>
                                <td>
                                    <?php echo $timecard['store']; ?>
                                </td>
                                <td>
                                    <?php echo $timecard['totalHours']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" style="text-align: left;">Total</th>
                            <th>
                                <?php echo $totalHours; ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="js/nav.js"></script>

</body>

</html>