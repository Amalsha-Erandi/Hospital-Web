<?php
session_start();
require_once "../../config.php"; 

// Fetch all staff members
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    

    <Style>

        
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Top Navigation */
        .top-nav {
            background-color: #2E4053;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            display: flex;
            flex: 1;
        }

        /* Side Navigation */
        .side-nav {
            width: 250px;
            background-color: #34495E;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .nav-items {
            list-style: none;
        }

        .nav-item {
            padding: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .nav-item a {
            color: white;
            text-decoration: none;
        }

        .nav-item:hover {
            background-color: #2980B9;
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
        }

        /* Staff Management Specific Styles */
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

    

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .data-table th, .data-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .data-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .data-table tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            color: white;
            transition: 0.3s;
        }

        .btn-primary { background-color: #2980B9; }
        .btn-success { background-color: #2ECC71; }
        .btn-danger { background-color: #E74C3C; }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .status-active {
            color: #2ECC71;
            font-weight: bold;
        }

        .status-inactive {
            color: #E74C3C;
            font-weight: bold;
        }
    
    </Style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Manage Staff</h1>
        </div>
        
        <div class="content">
            <div class="add-staff-section">
                <h2>Add New Staff Member</h2>
                <form action="add_doctor.php" method="POST" class="add-form">
                    <input type="text" name="s_name" placeholder="Staff Name" required>
                    <input type="text" name="s_position" placeholder="Position" required>
                    <input type="email" name="s_email" placeholder="Email" required>
                    <input type="text" name="s_phone" placeholder="Phone" required>
                    <button type="submit">Add Staff</button>
                </form>
            </div>

            <div class="staff-list">
                <h2>Staff List</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['s_name'] ?></td>
                            <td><?= $row['s_position'] ?></td>
                            <td><?= $row['s_email'] ?></td>
                            <td><?= $row['s_phone'] ?></td>
                            <td class="action-links">
                                <a href="edit_staff.php?id=<?= $row['id'] ?>" class="edit-link">Edit</a>
                                <a href="staff_delete.php?id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>