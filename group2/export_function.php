<?php
require_once('includes/load.php');
// Checking What level user has permission to view this page
page_require_level(2);

if(isset($_POST["Export"])){

    // Fetch records from the database 
    $query = $db->query("SELECT * FROM products ORDER BY id ASC"); 

    if($query->num_rows > 0){ 
        $delimiter = ","; 
        $filename = "products-data_" . date('Y-m-d') . ".csv"; 

        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 

        // Set column headers 
        $fields = array('Name', 'Quantity', 'Low stock quantity', 'Buying price', 'Selling price', 'Category ID', 'Media ID', 'Barcode'); 
        fputcsv($f, $fields, $delimiter); 

        // Output each row of the data, format line as CSV and write to file pointer 
        while($row = $query->fetch_assoc()){ 
            // If media_id is NULL, replace it with 0
            $media_id = isset($row['media_id']) ? $row['media_id'] : 0;
            $lineData = array($row['name'], $row['quantity'], $row['low_stock_quantity'], $row['buy_price'], $row['sale_price'], $row['categorie_id'], $media_id, $row['barcode']); 
            fputcsv($f, $lineData, $delimiter); 
        } 

        // Move back to the beginning of the file 
        fseek($f, 0); 
         
        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
         
        // Output all remaining data on a file pointer 
        fpassthru($f); 
    }
} 
exit;
?>
