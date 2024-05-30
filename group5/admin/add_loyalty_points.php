<?php
require_once '../include/dbcon.php';

if ($_POST['scannedBarcode']) {
    $barcode = $_POST['scannedBarcode'];

    try {
        // Query to get customer data by barcode
        $pdoQuery = "SELECT * from customer_account WHERE barcode_image = :barcode_image";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute(['barcode_image' => $barcode]);
        $customer = $pdoResult->fetch();

        if ($customer) {
            $customerId = $customer['id'];
            $currentPoints = $customer['LoyaltyPoints'];
            $currentVisits= $customer['TotalVisits'];

            // Increment loyalty points by 1
            $newPoints = $currentPoints + 1;
            $newVisitsPoints = $currentVisits + 1;

            // Update customer loyalty points
            $updateQuery = "UPDATE customer_account SET LoyaltyPoints = :points, TotalVisits = :visits WHERE id = :id";
            $updateResult = $pdoConnect->prepare($updateQuery);
            $updateResult->execute(['points' => $newPoints, 'visits' => $newVisitsPoints, 'id' => $customerId]);

            echo '<script>';
            echo 'alert("Points added!");';
            echo 'window.location.href = "customers.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Customer not found.");';
            echo 'window.location.href = "customers.php";';
            echo '</script>';
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>
