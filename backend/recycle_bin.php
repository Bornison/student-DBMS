<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycle Bin</title>
    <link rel="stylesheet" href="../frontend/style.css">
    <style>
        /* Add basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recycle Bin</h2>
        <a href="view_students.php">← Back to Student List</a><br><br>

        <?php
        require 'db_config.php';

        // Fetch soft-deleted students
        $result = $conn->query("SELECT * FROM students WHERE deleted_at IS NOT NULL");

        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                // Sanitize output to prevent XSS
                $id = htmlspecialchars($row['id']);
                $name = htmlspecialchars($row['name']);
                $email = htmlspecialchars($row['email']);
                $phone = htmlspecialchars($row['phone']);
                $course = htmlspecialchars($row['course']);

                echo "<tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$email}</td>
                    <td>{$phone}</td>
                    <td>{$course}</td>
                    <td>
                        <a href='restore_student.php?id={$id}'>Restore</a> | 
                        <a href='permanent_delete.php?id={$id}'>Delete Permanently</a>
                    </td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No deleted students found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
