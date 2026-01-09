<?php
require 'db_config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing student ID.");
}

$id = intval($_GET['id']); 

$stmt = $conn->prepare("UPDATE students SET deleted_at = NULL WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: recycle_bin.php"); 
    exit;
} else {
    error_log("Error restoring student with ID $id: " . $stmt->error, 3, "errors.log");
    echo "An error occurred while restoring the student. Please try again later.";
}

$stmt->close();
$conn->close();
?>
