<?php
require 'db_config.php';

if (!isset($_GET['id'])) {
    die("Student ID is missing.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ? AND deleted_at IS NULL");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Student not found or has been deleted.");
}

$student = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name   = htmlspecialchars(trim($_POST['name']));
    $email  = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone  = htmlspecialchars(trim($_POST['phone']));
    $course = htmlspecialchars(trim($_POST['course']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    $update = $conn->prepare("UPDATE students SET name=?, email=?, phone=?, course=? WHERE id=?");
    $update->bind_param("ssssi", $name, $email, $phone, $course, $id);

    if ($update->execute()) {
        header("Location: view_students.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $update->close();
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="../frontend/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required><br><br>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>"><br><br>

            <label>Course:</label>
            <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required><br><br>

            <input type="submit" value="Update">
        </form>
        <br>
        <a href="view_students.php">← Back to Student List</a>
    </div>
</body>
</html>
