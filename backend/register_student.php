<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db_config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $course = htmlspecialchars(trim($_POST['course']));

    if (empty($name) || empty($email) || empty($course)) {
        echo "Please fill all the required fields.";
        exit;
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    
    $stmt = $conn->prepare("INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $course);

    if ($stmt->execute()) {
        header("Location: ../backend/view_students.php"); 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
