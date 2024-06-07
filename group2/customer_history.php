<?php
$page_title = 'Customer Purchase History';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php');

// Check user permission level
page_require_level(1);

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Function to fetch customer purchase history by ID
    function find_customer_purchases_by_id($id) {
        global $pdoConnect;
        $sql = "SELECT * FROM customer_purchases WHERE customer_id = :id ORDER BY purchase_date DESC";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error and return null
            error_log("Error fetching customer purchase history: " . $e->getMessage());
            return null;
        }
    }

    // Fetch customer purchase history
    $customer_purchases = find_customer_purchases_by_id($customer_id);
} else {
    // Redirect if customer ID is not provided
    redirect('customers.php');
}
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Customer Purchase History</strong>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Purchase Date</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($customer_purchases): ?>
                                <?php foreach ($customer_purchases as $purchase): ?>
                                    <tr>
                                        <td><?php echo $purchase['id']; ?></td>
                                        <td><?php echo $purchase['purchase_date']; ?></td>
                                        <td><?php echo $purchase['product_name']; ?></td>
                                        <td><?php echo $purchase['quantity']; ?></td>
                                        <td><?php echo $purchase['total_price']; ?></td>
                                        <!-- Add more cells with purchase details -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No purchase history found for this customer.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
