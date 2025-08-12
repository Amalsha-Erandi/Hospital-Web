<?php
session_start();
require_once "../../config.php"; 

// Fetch all doctors
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
    <link rel="stylesheet" href="../css/manage_doctors.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Manage Doctors</h1>
        </div>
        
        <div class="content">
            <div class="add-doctor-section">
                <h2>Add New Doctor</h2>
                <form action="Add.php" method="POST" class="add-form">
                    <input type="text" name="name" placeholder="Doctor Name" required>
                    <input type="text" name="specialty" placeholder="Specialty" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone" required>
                    <button type="submit">Add Doctor</button>
                </form>
            </div>

            <div class="doctor-list">
                <h2>Doctor List</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialty</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['specialty'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td class="action-links">
                                <a href="edit_doctor.php?id=<?= $row['id'] ?>" class="edit-link">Edit</a>
                                <a href="Doctor_delete.php?id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>