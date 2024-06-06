<?php
require 'dbcon.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}

// Fetch data from the database
try {
    $stmt = $pdo->query('SELECT * FROM emp');
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="header">
            <h2>Employee List</h2>
            <a href="emp.php" class="add-employee-btn">Add Employee</a>
            <!-- Add a delete button with onclick event to trigger deletion of selected employees -->
            <button onclick="deleteSelected()">Delete Selected</button>
        </div>

        <div class="table-wrapper">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <!-- Add a checkbox column header -->
                            <th class="align-left"><input type="checkbox" id="select-all"></th>
                            <th class="align-left">No</th>
                            <th class="align-left">FullName</th>
                            <th class="align-left">Applied Role</th>
                            <th class="align-left">Application Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $index => $employee): ?>
                            <tr>
                                <!-- Add a checkbox for each row -->
                                <td><input type="checkbox" name="selectedEmployees[]"
                                        value="<?php echo $employee['userID']; ?>"></td>
                                <td onclick="location.href='crud/updateemp.php?id=<?php echo $employee['userID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $index + 1; ?>
                                </td>
                                <td onclick="location.href='crud/updateemp.php?id=<?php echo $employee['userID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $employee['Fullname']; ?>
                                </td>
                                <td onclick="location.href='crud/updateemp.php?id=<?php echo $employee['userID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $employee['AppliedRole']; ?>
                                </td>
                                <td onclick="location.href='crud/updateemp.php?id=<?php echo $employee['userID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $employee['Date']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script src="js/checkbox.js"></script>
    <script src="js/nav.js"></script>

</body>

</html>