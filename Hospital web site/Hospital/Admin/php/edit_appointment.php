<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];
$sql = "SELECT * FROM appointments WHERE id=$id";
$result = $conn->query($sql);
$appointment = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="../css/edit_appoinment.css">
    
</head>
<body>
    <div class="container">
        <h1>Edit Appointment</h1>
        <form action="update_appointment.php" method="POST">
            <input type="hidden" name="id" value="<?= $appointment['id'] ?>" class="hidden">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $appointment['name'] ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $appointment['email'] ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?= $appointment['phone'] ?>" required>
            </div>

            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" id="doctor" name="doctor" value="<?= $appointment['doctor'] ?>" required>
            </div>

            <div class="form-group">
                <label for="appointment_date">Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" value="<?= $appointment['appointment_date'] ?>" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Time:</label>
                <input type="time" id="appointment_time" name="appointment_time" value="<?= $appointment['appointment_time'] ?>" required>
            </div>

            <button type="submit">Update Appointment</button>
        </form>
    </div>
</body>
</html>
