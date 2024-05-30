<?php
require_once "include/connect/dbcon.php"; 
$quantity;

$id;

$sql = "UPDATE products SET quantity = ? WHERE id = ?";
$stmt = $pdoConnect->prepare($sql);
$stmt->execute([$quantity,$id]);

?>

