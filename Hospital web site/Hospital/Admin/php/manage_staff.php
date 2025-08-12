<?php
session_start();
require_once "../../config.php"; 


$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    <link rel="stylesheet" href="../css/StaffManage.css">

    
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