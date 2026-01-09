<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db_config.php';

$result = $conn->query("SELECT * FROM students WHERE deleted_at IS NULL");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            max-width: 1100px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .add-button,
        .recycle-button {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .recycle-button {
            background-color: #dc3545;
        }

        .add-button:hover {
            background-color: #218838;
        }

        .recycle-button:hover {
            background-color: #c82333;
        }

        table.student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.student-table th,
        table.student-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table.student-table th {
            background-color: #f1f1f1;
            color: #333;
        }

        table.student-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.student-table tr:hover {
            background-color: #eef1f5;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            color: white;
            margin-right: 6px;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>🎓 Student Registration System</h2>

    <div class="top-buttons">
        <a href="add_student.php" class="add-button">➕ Add New Student</a>
        <a href="recycle_bin.php" class="recycle-button">🗑️ Recycle Bin</a>
    </div>

    <table class="student-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>👤 Name</th>
                <th>📧 Email</th>
                <th>📱 Phone</th>
                <th>📘 Course</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['course']) ?></td>
                        <td>
                            <a href="edit_student.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                            <a href="delete_student.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align: center;">No students found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php $conn->close(); ?>
