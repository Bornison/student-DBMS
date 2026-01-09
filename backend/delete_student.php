<?php
require 'db_config.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing student ID.");
}

$id = intval($_GET['id']); 


$stmt = $conn->prepare("UPDATE students SET deleted_at = NOW() WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: view_students.php");
    exit;
} else {
    error_log("Error deleting student with ID $id: " . $stmt->error, 3, "errors.log");
    echo "An error occurred while deleting the student. Please try again later.";
}

$stmt->close();
$conn->close();
?>
