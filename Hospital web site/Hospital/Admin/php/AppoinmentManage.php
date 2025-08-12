<?php
session_start();
require_once "../../config.php";  


$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Appointments</title>

    <style>

body {
    font-family: 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    margin: 0;
    padding: 30px;
    min-height: 100vh;
}

.header {
    background: linear-gradient(to right, #4a90e2, #67b26f);
    padding: 25px;
    text-align: left;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.header h1 {
    margin: 0;
    font-size: 28px;
    color: white;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.container {
    max-width: 1300px;
    margin: 0 auto;
    background: transparent;
    border-radius: 12px;
}

.table-container {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
    margin-top: 10px;
}

th {
    color: #516170;
    font-weight: 600;
    padding: 15px 20px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: transparent;
    border: none;
}

td {
    padding: 20px;
    background: #f8fafc;
    margin-bottom: 8px;
    font-size: 15px;
    color: #516170;
    border: none;
}

tr:not(:first-child) {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
    border-radius: 8px;
}

tr:not(:first-child) td:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

tr:not(:first-child) td:last-child {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}

.action-links a {
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 6px;
    margin: 0 4px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.edit-link {
    background: #4a90e2;
    color: white;
    border: 1px solid #4a90e2;
}

.edit-link:hover {
    background: white;
    color: #4a90e2;
}

.delete-link {
    background: #dc3545;
    color: white;
    border: 1px solid #dc3545;
}

.delete-link:hover {
    background: white;
    color: #dc3545;
}

@media (max-width: 768px) {
    body {
        padding: 15px;
    }
    
    .container {
        margin: 0;
    }
    
    .table-container {
        padding: 15px;
        overflow-x: auto;
    }
    
    table {
        font-size: 13px;
    }
    
    th, td {
        padding: 12px 15px;
    }
    
    .action-links a {
        padding: 6px 12px;
        font-size: 13px;
    }
    
    .header {
        padding: 20px;
    }
    
    .header h1 {
        font-size: 24px;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Manage Appointments</h1>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['doctor'] ?></td>
                        <td><?= $row['appointment_date'] ?></td>
                        <td><?= $row['appointment_time'] ?></td>
                        <td class="action-links">
                            <a href="edit_appointment.php?id=<?= $row['id'] ?>" class="edit-link">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>