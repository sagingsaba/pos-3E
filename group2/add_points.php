<?php
$page_title = 'Scan Barcode';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php');

// Check what level user has permission to view this page
page_require_level(1);

// Initialize message variable
$msg = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barcode = $_POST['barcode'];

    // Function to find customer by barcode
    function find_customer_by_barcode($barcode) {
        global $pdoConnect;
        $sql = "SELECT * FROM customer_account WHERE barcode_image = :barcode";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':barcode', $barcode, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null; // Ensure it returns null if no customer found
        } catch (PDOException $e) {
            // Log the error and return null
            error_log("Error fetching customer details: " . $e->getMessage());
            return null;
        }
    }

    // Fetch customer details by barcode
    $customer = find_customer_by_barcode($barcode);

    if ($customer) {
        // Add points to customer's loyalty account
        $points_to_add = 1; // Set the points you want to add
        $new_loyalty_points = $customer['LoyaltyPoints'] + $points_to_add;

        $addvisitpoints = 1;
        $new_visit_points = $customer['TotalVisits'] + $addvisitpoints;

        // Update customer points in the database
        $sql = "UPDATE customer_account SET LoyaltyPoints = :points, TotalVisits = :addvisitpoints WHERE id = :id";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':points', $new_loyalty_points, PDO::PARAM_INT);
            $stmt->bindParam(':addvisitpoints', $new_visit_points, PDO::PARAM_INT);
            $stmt->bindParam(':id', $customer['id'], PDO::PARAM_INT);
            $stmt->execute();
            $msg = "Points added successfully!";
        } catch (PDOException $e) {
            error_log("Error updating loyalty points: " . $e->getMessage());
            $msg = "Error updating points.";
        }
    } else {
        $msg = "Customer not found!";
    }
}
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php
     // Check if $msg is an array and handle accordingly
     if (is_array($msg)) {
         echo display_msg_points($msg);
     } else {
         echo display_msg_points($msg);
     }
     ?>
   </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Scan Barcode</strong>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Scan barcode..." required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Points</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
