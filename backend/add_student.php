<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);

    if (empty($name) || empty($email) || empty($course)) {
        echo "Please fill all the required fields.";
    } else 
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
        } else 
        {
            $stmt = $conn->prepare("INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $course);
            if ($stmt->execute()) {
               
                header("Location: view_students.php");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
    <link rel="stylesheet" href="../frontend/style.css">
</head>
<body>
    <h2>Register New Student</h2>
    <form action="add_student.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone"><br><br>

        <label>Course:</label>
        <input type="text" name="course" required><br><br>

        <input type="submit" value="Add Student">
    </form>
    <br>
    <a href="view_students.php">View Students</a>
</body>
</html>
