<?php
include '../../config.php'; 

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM feedback_queries WHERE id = $id");
    echo "<script>alert('Entry deleted successfully');</script>";
}


$feedbacks = mysqli_query($conn, "SELECT * FROM feedback_queries WHERE type = 'feedback' ORDER BY submitted_at DESC");
$queries = mysqli_query($conn, "SELECT * FROM feedback_queries WHERE type = 'query' ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedback & Queries</title>
    
    <style>
        body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    padding: 20px;
}

.container {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2, h3 {
    text-align: center;
    color: #2C3E50;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
}

input, select, textarea {
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
}

button {
    margin-top: 15px;
    padding: 10px;
    border: none;
    background: #3498DB;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #2980B9;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background: #3498DB;
    color: white;
}

td a {
    color: red;
    text-decoration: none;
}



    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback & Queries Management</h2>

        <h3>Feedback</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($feedbacks)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= $row['submitted_at'] ?></td>
                <td>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <h3>Queries</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($queries)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= $row['submitted_at'] ?></td>
                <td>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
