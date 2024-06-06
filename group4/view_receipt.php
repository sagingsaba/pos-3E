<!DOCTYPE html>
<html>
<head>
    <title>View Receipt - Banana Grocery Products</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
.button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #007bff; /* Blue color */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    border-radius: 5px;
    margin-top: 20px;
}

.button:hover {
    background-color: green;
}

.receipt-container {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-top: 20px;
}

.receipt-container h2 {
    margin-top: 0;
}
</style>


<body>
    <h1>View Receipt - Banana Grocery Products</h1>

    <div class="receipt-container">
        <h2>Receipt #R001</h2>
        <p><strong>Date:</strong> 2024-04-15</p>
        <p><strong>Total Amount:</strong> $150.00</p>
        <p><strong>Status:</strong> Paid</p>
        <h2>Choice Harvest Banana</h2>
        <p><strong>Date:</strong> 2024-04-15</p>
        <p><strong>Total Amount:</strong> $150.00</p>
        <p><strong>Status:</strong> Paid</p>
        <h2>Chicken Breast Fillet</h2>
        <p><strong>Date:</strong> 2024-04-16</p>
        <p><strong>Total Amount:</strong> $200.00</p>
        <p><strong>Status:</strong> Paid</p>
        <h2>Hotdog Cheesedog</h2>
        <p><strong>Date:</strong> 2024-04-17</p>
        <p><strong>Total Amount:</strong> $180.00</p>
        <p><strong>Status:</strong> Paid</p>
    </div>

    <a href="reciepthistory.php" class="button">Return</a>
</body>
</html>