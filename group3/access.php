<?php
require 'dbcon.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}

try {
    // Execute the query to count the number of employees for each role and access
    $stmt = $pdo->query('SELECT ar.accessID, ar.name, ar.access, COUNT(e.userID) AS EmployeeCount
                         FROM accessright ar
                         LEFT JOIN emp e ON ar.accessID = e.accessID
                         GROUP BY ar.accessID, ar.name, ar.access');
    $roleAccessCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <h2>Role and Access Summary</h2>
            <a href="crud/addaccess.php" class="add-employee-btn">Add Role</a>
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
                            <th class="align-left">Role</th>
                            <th class="align-left">Access</th>
                            <th class="align-left">Employee Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($roleAccessCounts as $index => $roleAccessCount): ?>
                            <tr>
                                <!-- Add a checkbox for each row -->
                                <td><input type="checkbox" name="selectedRoles[]"
                                        value="<?php echo $roleAccessCount['accessID']; ?>"></td>
                                <td>
                                    <?php echo $index + 1; ?>
                                </td>
                                <td onclick="location.href='crud/updateaccess.php?id=<?php echo $roleAccessCount['accessID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $roleAccessCount['name']; ?>
                                </td>
                                <td onclick="location.href='crud/updateaccess.php?id=<?php echo $roleAccessCount['accessID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $roleAccessCount['access']; ?>
                                </td>
                                <td onclick="location.href='crud/updateaccess.php?id=<?php echo $roleAccessCount['accessID']; ?>';"
                                    style="cursor: pointer;">
                                    <?php echo $roleAccessCount['EmployeeCount']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
        // Function to handle deletion of selected employees
        function deleteSelected() {
            var checkboxes = document.querySelectorAll('input[name="selectedRoles[]"]:checked');
            var roleIDs = [];
            checkboxes.forEach(function (checkbox) {
                roleIDs.push(checkbox.value);
            });

            if (roleIDs.length === 0) {
                alert('Please select at least one role to delete.');
            } else {
                var confirmation = confirm('Are you sure you want to delete the selected roles?');
                if (confirmation) {
                    // Redirect to delete script with selected role IDs
                    window.location.href = 'crud/deleterole.php?ids=' + roleIDs.join(',');
                }
            }
        }
    </script>
    <script src="js/nav.js"></script>

</body>

</html>