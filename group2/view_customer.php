<?php
$page_title = 'View Customer';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php');
require_once '../group5/customer_barcode/vendor/autoload.php'; // Include the Composer autoload file

use Picqer\Barcode\BarcodeGeneratorPNG;

// Check what level user has permission to view this page
page_require_level(1);

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Function to fetch customer details by ID
    function find_customer_by_id($id) {
        global $pdoConnect;
        $sql = "SELECT * FROM posfinale.customer_account WHERE id = :id";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error and return null
            error_log("Error fetching customer details: " . $e->getMessage());
            return null;
        }
    }

    // Fetch customer details
    $customer = find_customer_by_id($customer_id);

    // Check if the barcode string is not empty before generating the barcode image
    if (!empty($customer['barcode_image'])) {
        // Generate barcode image
        $generator = new BarcodeGeneratorPNG();
        $barcodeImage = $generator->getBarcode($customer['barcode_image'], $generator::TYPE_CODE_128);
        
        // Check if barcode image was successfully generated
        if ($barcodeImage === false) {
            // Log the error
            error_log("Error generating barcode image: Invalid barcode string.");
            // Set barcode image to null or default image if desired
            $barcodeImage = null; // or specify path to default barcode image
        }
    } else {
        // Set barcode image to null or default image if desired
        $barcodeImage = null; // or specify path to default barcode image
    }
} else {
    // Redirect if customer ID is not provided
    redirect('customers.php');
}
?>

<?php include_once('layouts/header.php'); ?>

<style>
/* Custom styles */
.customer-details {
    margin-top: 20px;
}

.customer-details .panel-body {
    padding: 20px;
}

.customer-details .panel-body img {
    max-width: 150px;
    max-height: 150px;
}

.customer-details .rows {
    display: flex;
    flex-direction: column; /* Change flex direction to column */
}

.customer-details .rows dt,
.customer-details .rows dd {
    width: 100%; /* Set width to 100% for full width */
}

.button-group {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
}
</style>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3 customer-details">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Customer Details</strong>
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <?php if (!empty($customer['profpic'])): ?>
                        <img src="<?php echo htmlspecialchars($customer['profpic']); ?>" alt="Profile Picture" class="img-circle">
                    <?php else: ?>
                        <img src="path/to/default/profile/pic.jpg" alt="No Profile Picture" class="img-circle">
                    <?php endif; ?>
                </div>
                <dl>
                    <br>
                    <dd style="text-align: center; font-size: 20px"><?php echo $customer['FullName']; ?></dd>

                    <dt>Email:</dt>
                    <dd><?php echo $customer['Email']; ?></dd>

                    <dt>Contact:</dt>
                    <dd><?php echo $customer['Contact']; ?></dd>

                    <dt>Address:</dt>
                    <dd><?php echo $customer['Address']; ?></dd>

                    <dt class="rows">Loyalty Points:</dt>
                    <dd class="rows"><?php echo $customer['LoyaltyPoints']; ?></dd>

                    <dt class="rows">Total Visits:</dt>
                    <dd class="rows"><?php echo $customer['TotalVisits']; ?></dd>

                    <dt class="rows">Total Purchase:</dt>
                    <dd class="rows"><?php echo $customer['TotalPurchase']; ?></dd>

                    <dt>Barcode Image:</dt>
                    <dd>
                        <?php if (!empty($barcodeImage)): ?>
                            <?php echo '<img src="data:image/png;base64,' . base64_encode($barcodeImage) . '" alt="Barcode Image">'; ?>
                        <?php else: ?>
                            <!-- Default barcode image or placeholder -->
                            <img src="path/to/default/barcode/image.jpg" alt="No Barcode Image">
                        <?php endif; ?>
                    </dd>
                </dl>
                <div class="button-group">
                    <a href="edit_customer.php?id=<?php echo $customer_id; ?>" class="btn btn-warning">Edit Customer</a>
                    <a href="customer_history.php?id=<?php echo $customer_id; ?>" class="btn btn-info">View History</a>
                    <a href="add_points.php" class="btn btn-success">Scan Barcode</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
