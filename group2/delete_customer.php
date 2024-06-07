<?php
$page_title = 'Delete Customer';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php');

// Check what level user has permission to view this page
page_require_level(1);

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Function to delete customer by ID
    function delete_customer_by_id($id) {
        global $pdoConnect;
        $sql = "DELETE FROM customer_account WHERE id = :id";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0; // Returns true if a row was deleted
        } catch (PDOException $e) {
            // Log the error and return false
            error_log("Error deleting customer: " . $e->getMessage());
            return false;
        }
    }

    // Attempt to delete the customer
    if (delete_customer_by_id($customer_id)) {
        $session->msg('s', "Customer deleted successfully.");
    } else {
        $session->msg('d', "Failed to delete customer.");
    }

    // Redirect to the customer list
    redirect('customer.php');
} else {
    // Redirect if customer ID is not provided
    redirect('customer.php');
}
?>
