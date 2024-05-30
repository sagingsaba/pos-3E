<?php
require '../dbcon.php'; // Assuming this file contains the database connection
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Determine the access type based on the checkboxes
        $access = '';
        if (isset($_POST['pos']) && isset($_POST['back_office'])) {
            $access = 'pos,back_office'; // Both POS and Back Office
        } elseif (isset($_POST['pos'])) {
            $access = 'pos'; // Only POS
        } elseif (isset($_POST['back_office'])) {
            $access = 'back_office'; // Only Back Office
        }

        // Prepare a SQL statement to insert/update the role and access
        $stmt = $pdo->prepare("INSERT INTO accessright (name, access, accept, discounts, taxes, drawer, viewreceipts, refunds, Reprint, shift, Manageitem, costitem, settings, bViewsales, bmanageitem, bviewcost, bmanageemployee, bmanagecustomers, bmanagefeatured, bmanagebilling, bmanagepayment, bmanageloyalty, bmanagetaxes) 
                       VALUES (:name, :access, :accept, :discounts, :taxes, :drawer, :viewreceipts, :refunds, :Reprint, :shift, :Manageitem, :costitem, :settings, :bViewsales, :bmanageitem, :bviewcost, :bmanageemployee, :bmanagecustomers, :bmanagefeatured, :bmanagebilling, :bmanagepayment, :bmanageloyalty, :bmanagetaxes)
                       ON DUPLICATE KEY UPDATE 
                       access = VALUES(access), 
                       accept = VALUES(accept), 
                       discounts = VALUES(discounts), 
                       taxes = VALUES(taxes), 
                       drawer = VALUES(drawer), 
                       viewreceipts = VALUES(viewreceipts), 
                       refunds = VALUES(refunds), 
                       Reprint = VALUES(Reprint), 
                       shift = VALUES(shift), 
                       Manageitem = VALUES(Manageitem), 
                       costitem = VALUES(costitem), 
                       settings = VALUES(settings), 
                       bViewsales = VALUES(bViewsales), 
                       bmanageitem = VALUES(bmanageitem), 
                       bviewcost = VALUES(bviewcost), 
                       bmanageemployee = VALUES(bmanageemployee), 
                       bmanagecustomers = VALUES(bmanagecustomers), 
                       bmanagefeatured = VALUES(bmanagefeatured), 
                       bmanagebilling = VALUES(bmanagebilling), 
                       bmanagepayment = VALUES(bmanagepayment), 
                       bmanageloyalty = VALUES(bmanageloyalty), 
                       bmanagetaxes = VALUES(bmanagetaxes)");

        // Bind parameters
        $stmt->bindParam(':name', $_POST['Fullname']);
        $stmt->bindParam(':access', $access);
        // The rest of the parameter bindings remain the same



        // Assign values to variables
        $acceptValue = isset($_POST['accept']) ? 1 : 0;
        $discountsValue = isset($_POST['discounts']) ? 1 : 0;
        $taxesValue = isset($_POST['taxes']) ? 1 : 0;
        $drawerValue = isset($_POST['drawer']) ? 1 : 0;
        $viewreceiptsValue = isset($_POST['viewreceipts']) ? 1 : 0;
        $refundsValue = isset($_POST['refunds']) ? 1 : 0;
        $ReprintValue = isset($_POST['Reprint']) ? 1 : 0;
        $shiftValue = isset($_POST['shift']) ? 1 : 0;
        $ManageitemValue = isset($_POST['Manageitem']) ? 1 : 0;
        $costitemValue = isset($_POST['costitem']) ? 1 : 0;
        $settingsValue = isset($_POST['settings']) ? 1 : 0;
        $bViewsalesValue = isset($_POST['bViewsales']) ? 1 : 0;
        $bmanageitemValue = isset($_POST['bmanageitem']) ? 1 : 0;
        $bviewcostValue = isset($_POST['bviewcost']) ? 1 : 0;
        $bmanageemployeeValue = isset($_POST['bmanageemployee']) ? 1 : 0;
        $bmanagecustomersValue = isset($_POST['bmanagecustomers']) ? 1 : 0;
        $bmanagefeaturedValue = isset($_POST['bmanagefeatured']) ? 1 : 0;
        $bmanagebillingValue = isset($_POST['bmanagebilling']) ? 1 : 0;
        $bmanagepaymentValue = isset($_POST['bmanagepayment']) ? 1 : 0;
        $bmanageloyaltyValue = isset($_POST['bmanageloyalty']) ? 1 : 0;
        $bmanagetaxesValue = isset($_POST['bmanagetaxes']) ? 1 : 0;

        // Bind parameters
        $stmt->bindParam(':name', $_POST['Fullname']);
        $stmt->bindParam(':accept', $acceptValue);
        $stmt->bindParam(':discounts', $discountsValue);
        $stmt->bindParam(':taxes', $taxesValue);
        $stmt->bindParam(':drawer', $drawerValue);
        $stmt->bindParam(':viewreceipts', $viewreceiptsValue);
        $stmt->bindParam(':refunds', $refundsValue);
        $stmt->bindParam(':Reprint', $ReprintValue);
        $stmt->bindParam(':shift', $shiftValue);
        $stmt->bindParam(':Manageitem', $ManageitemValue);
        $stmt->bindParam(':costitem', $costitemValue);
        $stmt->bindParam(':settings', $settingsValue);
        $stmt->bindParam(':bViewsales', $bViewsalesValue);
        $stmt->bindParam(':bmanageitem', $bmanageitemValue);
        $stmt->bindParam(':bviewcost', $bviewcostValue);
        $stmt->bindParam(':bmanageemployee', $bmanageemployeeValue);
        $stmt->bindParam(':bmanagecustomers', $bmanagecustomersValue);
        $stmt->bindParam(':bmanagefeatured', $bmanagefeaturedValue);
        $stmt->bindParam(':bmanagebilling', $bmanagebillingValue);
        $stmt->bindParam(':bmanagepayment', $bmanagepaymentValue);
        $stmt->bindParam(':bmanageloyalty', $bmanageloyaltyValue);
        $stmt->bindParam(':bmanagetaxes', $bmanagetaxesValue);


        // Execute the statement
        $stmt->execute();

        echo "Role and access rights saved successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/access.css">
    <title>Add Role</title>
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
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="right-align">
        <div><b>
                <?php echo $username; ?>
            </b><br><b>
                <small>Administrator</small></b>
        </div>
    </div>

    <div class="container">
        <h2>Create Role:</h2>
        <form action="addaccess.php" method="POST">
            <label for="fullname">Name:</label>
            <input type="text" id="Fullname" name="Fullname" required><br><br>
            <!-- POS Toggle Button -->
            <label for="pos">POS:</label>
            <input type="checkbox" id="pos" name="pos" class="toggle-btn"><br><br>

            <!-- Additional options for POS -->
            <div class="additional-options" id="pos-options">
                <label><input type="checkbox" name="accept" value=""> Accept payments</label>
                <label><input type="checkbox" name="discounts" value=""> Apply discounts with restricted
                    access</label>
                <label><input type="checkbox" name="taxes" value=""> Change taxes in a sale</label>
                <label><input type="checkbox" name="drawer" value=""> Open cash drawer without making a
                    sale</label>
                <label><input type="checkbox" name="viewreceipts" value=""> View all receipts</label>
                <label><input type="checkbox" name="refunds" value=""> Perform refunds</label>
                <label><input type="checkbox" name="Reprint" value=""> Reprint and resend receipts</label>
                <label><input type="checkbox" name="shift" value=""> View shift report</label>
                <label><input type="checkbox" name="Manageitem" value=""> Manage items</label>
                <label><input type="checkbox" name="costitem" value=""> View cost of items</label>
                <label><input type="checkbox" name="settings" value=""> Change settings</label>
            </div>

            <!-- Back Office Toggle Button -->
            <label for="back_office">Back Office:</label>
            <input type="checkbox" id="back_office" name="back_office" class="toggle-btn"><br><br>

            <!-- Additional options for Back Office -->
            <div class="additional-options" id="back-office-options">
                <label><input type="checkbox" name="bViewsales" value=""> View sales reports</label>
                <label><input type="checkbox" name="bcancelreceipts" value=""> Cancel receipts</label>
                <label><input type="checkbox" name="bmanageitem" value=""> Manage items</label>
                <label><input type="checkbox" name="bviewcost" value=""> View cost of items</label>
                <label><input type="checkbox" name="bmanageemployee" value=""> Manage employees</label>
                <label><input type="checkbox" name="bmanagecustomers" value=""> Manage customers</label>
                <label><input type="checkbox" name="bmanagefeatured" value=""> Manage feature settings</label>
                <label><input type="checkbox" name="bmanagebilling" value=""> Manage billing</label>
                <label><input type="checkbox" name="bmanagepayment" value=""> Manage payment types</label>
                <label><input type="checkbox" name="bmanageloyalty" value=""> Manage loyalty program</label>
                <label><input type="checkbox" name="bmanagetaxes" value=""> Manage taxes</label>
            </div>

            <button type="submit">Add Role</button>
        </form>
    </div>

    <script>

        document.getElementById('pos').addEventListener('change', function () {
            var posOptions = document.getElementById('pos-options');
            posOptions.style.display = this.checked ? 'block' : 'none';
            // Toggle value between 1 and 0
            document.getElementById('pos_value').value = this.checked ? '1' : '0';
        });

        document.getElementById('back_office').addEventListener('change', function () {
            var backOfficeOptions = document.getElementById('back-office-options');
            backOfficeOptions.style.display = this.checked ? 'block' : 'none';
            // Toggle value between 1 and 0
            document.getElementById('back_office_value').value = this.checked ? '1' : '0';
        });
    </script>

    <script>document.querySelector('.dropdown-btn').addEventListener('click', function (e) {
            e.preventDefault();
            var dropdown = this.parentNode;
            dropdown.classList.toggle('active');
        });</script>

</body