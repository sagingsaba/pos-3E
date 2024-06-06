<?php
require_once '../include/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['scannedBarcode'])) {
    $barcode = htmlspecialchars(trim($_POST['scannedBarcode']));

    try {
        // Start transaction
        $pdoConnect->beginTransaction();

        // Query to get customer data by barcode
        $pdoQuery = "SELECT * FROM customer_account WHERE barcode_image = :barcode_image";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute(['barcode_image' => $barcode]);
        $customer = $pdoResult->fetch();

        if ($customer) {
            $customerId = $customer['id'];
            $currentPoints = $customer['LoyaltyPoints'];
            $currentVisits = $customer['TotalVisits'];
            $currentTotalPurchase = $customer['TotalPurchase'];

            $todayPurchase = 50;
            $newTotalPurchase = $currentTotalPurchase + $todayPurchase;
            $newPoints = $currentPoints + ($todayPurchase * 0.01) + 1;
            $newVisitsPoints = $currentVisits + 1;

            // Update today's visits in the counter table
            $updateCounterQuery = "UPDATE counter SET visits = visits + 1, tvisit = tvisit + 1, date = NOW() WHERE id = 1";
            $pdoConnect->exec($updateCounterQuery);

            // Insert customer history
            $customerName = $customer['FullName'];
            $purchaseDate = date('Y-m-d H:i:s'); // Current date and time
            $totalPurchaseAmount = $todayPurchase;

            $pdoHistoryQuery = "INSERT INTO customer_history (customerName, customerPdate, customerPtotal) VALUES (:customerName, :customerPdate, :customerPtotal)";
            $pdoHistoryStmt = $pdoConnect->prepare($pdoHistoryQuery);
            $pdoHistoryStmt->execute([
                ':customerName' => $customerName,
                ':customerPdate' => $purchaseDate,
                ':customerPtotal' => $totalPurchaseAmount
            ]);

            // Update customer loyalty points, visits, and total purchase
            $updateCustomerQuery = "UPDATE customer_account SET LoyaltyPoints = :points, TotalVisits = :visits, TotalPurchase = :totalPurchase WHERE id = :id";
            $updateCustomerStmt = $pdoConnect->prepare($updateCustomerQuery);
            $updateCustomerStmt->execute([
                'points' => $newPoints,
                'visits' => $newVisitsPoints,
                'totalPurchase' => $newTotalPurchase,
                'id' => $customerId
            ]);

            // Commit transaction
            $pdoConnect->commit();

            echo '<script>';
            echo 'alert("Points added!");';
            echo 'window.location.href = "customers.php";';
            echo '</script>';
        } else {
            $pdoConnect->rollBack();
            echo '<script>';
            echo 'alert("Customer not found.");';
            echo 'window.location.href = "customers.php";';
            echo '</script>';
        }
    } catch (PDOException $error) {
        $pdoConnect->rollBack();
        // Log the error message instead of displaying it to the user
        error_log("Database error: " . $error->getMessage());

        echo '<script>';
        echo 'alert("An error occurred while processing the request.");';
        echo 'window.location.href = "customers.php";';
        echo '</script>';
    }
}
?>
