<?php
// Connect to your database using PDO
include("../db.php");

if (isset($_GET['q'])) {
    $query = $_GET['q'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM `book` WHERE `book_name` LIKE :query LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':query', $queryWildcard);
    
    // Add wildcard to the query for a partial match
    $queryWildcard = "%$query%";
    
    // Execute the prepared statement
    $stmt->execute();

    // Fetch results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode($results);

    // Close the database connection
}
?>
