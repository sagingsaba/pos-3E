<?php
require_once '../include/dbcon.php';

if (isset($_GET["search_query"])) {
    $search_query = $_GET["search_query"];
    $pdoQuery = 'SELECT * FROM customer_account WHERE FullName LIKE :search_query OR Email LIKE :search_query';
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute(['search_query' => '%' . $search_query . '%']);
    $customers = $pdoResult->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($customers);
}
?>
