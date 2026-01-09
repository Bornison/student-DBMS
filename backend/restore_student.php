<?php
require 'db_config.php';

if (!isset($_GET['id'])) {
    die("Student ID is missing.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("UPDATE students SET deleted_at = NULL WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: recycle_bin.php");
    exit;
} else {
    echo "Error restoring student: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
