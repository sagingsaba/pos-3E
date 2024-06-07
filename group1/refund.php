<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
    exit();
}

$loggedemail = $_SESSION['email'];
require_once "include/connect/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $receipt = $_POST['receipt'] ?? '';
    if (empty($receipt)) {
        echo "Please input a receipt ID";
    } else {
        $sql = "SELECT ri.id AS receipt_item_id, ri.receipt_id, ri.quantity AS order_quantity, ri.status, p.id AS product_id, p.name, p.sale_price, p.quantity AS available_quantity
                FROM receipt_item AS ri
                JOIN products AS p ON ri.item_id = p.id
                WHERE ri.receipt_id = ?";

        $stmt = $pdoConnect->prepare($sql);
        $stmt->execute([$receipt]);
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (isset($_POST['refundbtn'])) {
    $requiredFields = ['receipt_item_id', 'reason', 'quantity', 'price', 'available', 'product_id', 'order_quantity', 'product_name'];
    $missingFields = array_diff($requiredFields, array_keys($_POST));
    if (empty($missingFields)) {
        $receipt_item_id = $_POST['receipt_item_id'];
        $reason = $_POST['reason'];
        $order_quantity = $_POST['order_quantity'];
        $user_quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $available_quantity = $_POST['available'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $timestamp = date('Y-m-d H:i:s');

        if ($user_quantity > $order_quantity || $user_quantity <= 0) {
            echo "Invalid quantity. Please check your inputted quantity";
        } else {
            $update_quantity = $available_quantity + $user_quantity;

            $sql_update_products = "UPDATE products SET quantity = ? WHERE id = ?";
            $stmt_update_products = $pdoConnect->prepare($sql_update_products);
            if ($stmt_update_products->execute([$update_quantity, $product_id])) {
                $total = $user_quantity * $price;
                $_SESSION['refunds'] = ($_SESSION['refunds'] ?? 0) + $total;

                $sqlstatus = "UPDATE receipt_item SET status = ? WHERE id = ?";
                $stmtstatus = $pdoConnect->prepare($sqlstatus);
                if ($stmtstatus->execute(["refunded", $receipt_item_id])) {
                    $sql_insert_refund = "INSERT INTO refund_items (receipt_item_id, refund_quantity, cashier_id, timestamps, reason) 
                                          VALUES (?,?,?,?,?)";
                    $stmt_insert_refund = $pdoConnect->prepare($sql_insert_refund);
                    if ($stmt_insert_refund->execute([$receipt_item_id, $user_quantity, $_SESSION['user_id'], $timestamp, $reason])) {
                        $last_refund_id = $pdoConnect->lastInsertId();

                        // Store refund details in session array
                        $_SESSION['refund_receipt'][] = [
                            'refund_id' => $last_refund_id,
                            'name' => $product_name,
                            'quantity' => $user_quantity,
                            'price' => $price,
                            'total' => $total,
                            'reason' => $reason,
                            'timestamp' => $timestamp
                        ];

                        echo "Success: Refund completed. Refund ID: " . htmlspecialchars($last_refund_id);
                    } else {
                        echo "Error: Unable to insert refund details.";
                    }
                } else {
                    echo "Error: Unable to update receipt item status.";
                }
            } else {
                echo "Error: Unable to update product quantity.";
            }
        }
    } else {
        echo "Error: Missing required data for refund.";
    }
}

if (isset($_POST['print_receipt'])) {
    // Clear the refund receipt array after printing
    $_SESSION['refund_receipt'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Refund</title>
    <link rel="icon" type="image/png" href="include/image/sadas1.png">
    <link rel="stylesheet" href="include/styles/global.css">
    <script>
        function printReceipt() {
            var receiptContent = document.getElementById('receipt-container').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = receiptContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.href = window.location.href; // Reload the page to clear session
        }
    </script>

<style>
    .refund-details {
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #ddd;
        padding-bottom: 1rem;
    }
    .refund-details p {
        margin: 0.5rem 0;
    }
</style>
</head>
<body>
<nav>
    <div class="logo">
        <img src="include/image/sadas.png" alt="Company Logo" class="logo_pic">
        <div class="text_logo">POS System</div>
    </div>
    <div class="dropdown">
        <div class="acc_name" id="acc_name"><?php echo htmlspecialchars($loggedemail); ?></div>
        <div class="dropdown-content" id="logout_dropdown">
            <a href="home.php">Home</a>
            <a href="cashmanagement.php">Cash Management</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="form" style="margin-top:4%">
    <h2 style="display: block; text-align: center; margin-bottom: 12%;">Refund:</h2>
    <form method="post">
        <div>
            <label for="receipt">Receipt ID:</label>
            <input type="text" name="receipt" id="receipt" placeholder="Enter receipt id" required>
            <input type="submit" name="search" value="Search">
        </div>
    </form>

    <div id="refund-form-container">
        <?php if (!empty($fetch_data)) { ?>
            <div class="receipt-details">
                <h3>Receipt ID: <?php echo htmlspecialchars($receipt); ?></h3>
                <table border="1">
                    <tr>
                        <th>Item name</th>
                        <th>Item price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($fetch_data as $item) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['sale_price']); ?></td>
                            <td><?php echo htmlspecialchars($item['order_quantity']); ?></td>
                            <td>
                                <?php if ($item['status'] !== "refunded") { ?>
                                    <form method="POST">
                                        <input type="hidden" name="receipt_item_id" value="<?php echo htmlspecialchars($item['receipt_item_id']); ?>">
                                        <input type="hidden" name="available" value="<?php echo htmlspecialchars($item['available_quantity']); ?>">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['product_id']); ?>">
                                        <input type="hidden" name="order_quantity" value="<?php echo htmlspecialchars($item['order_quantity']); ?>">
                                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['sale_price']); ?>">
                                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                                        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['order_quantity']); ?>" min="1" max="<?php echo htmlspecialchars($item['order_quantity']); ?>" required>
                                        <label for="reason_id">Reason:</label>
                                        <select name="reason" id="reason_id" class="custom-select" style="margin: 4%;">
                                            <option value="Expired or spoiled product">Expired or spoiled product</option>
                                            <option value="Incorrect item received">Incorrect item received</option>
                                            <option value="Product damaged during transportation">Product damaged during transportation</option>
                                            <option value="Dissatisfied with product quality">Dissatisfied with product quality</option>
                                            <option value="Product packaging damaged or tampered">Product packaging damaged or tampered</option>
                                            <option value="Unwanted or unused item">Unwanted or unused item</option>
                                            <option value="Product not as described">Product not as described</option>
                                            <option value="Product past its sell-by date">Product past its sell-by date</option>
                                            <option value="Product contaminated or foreign object found">Product contaminated or foreign object found</option>
                                            <option value="Allergic reaction to product">Allergic reaction to product</option>
                                            <option value="Product missing from order">Product missing from order</option>
                                            <option value="Overcharged for item">Overcharged for item</option>
                                            <option value="Change of mind">Change of mind</option>
                                            <option value="Duplicate purchase">Duplicate purchase</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <input type="submit" name="refundbtn" value="Refund">
                                    </form>
                                <?php } else {
                                    echo "Item already refunded";
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else {
            echo "Search for a receipt to display data";
        } ?>
    </div>

    <div id="receipt-container">
        <?php if (!empty($_SESSION['refund_receipt'])) { ?>
            <div class="refund-receipt">
    <h3>Refund Receipt</h3>
    <?php foreach ($_SESSION['refund_receipt'] as $refund) { ?>
        <div class="refund-details">
            <p>Refund ID: <?php echo htmlspecialchars($refund['refund_id']); ?></p>
            <p>Item Name: <?php echo htmlspecialchars($refund['name']); ?></p>
            <p>Quantity: <?php echo htmlspecialchars($refund['quantity']); ?></p>
            <p>Price: <?php echo htmlspecialchars($refund['price']); ?></p>
            <p>Total: <?php echo htmlspecialchars($refund['total']); ?></p>
            <p>Reason: <?php echo htmlspecialchars($refund['reason']); ?></p>
            <p>Timestamp: <?php echo htmlspecialchars($refund['timestamp']); ?></p>
        </div>
    <?php } ?>
</div>
        
        <?php } else {
            echo "No refunds to display.";
        } ?>
    </div>
    <button onclick="printReceipt()">Print Receipt</button>
</div>
</body>
</html>
