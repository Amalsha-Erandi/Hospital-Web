<?php
session_start();
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    // Insert data into the database
    $sql = "INSERT INTO appointments (name, email, phone, doctor, appointment_date, appointment_time) 
            VALUES ('$name', '$email', '$phone', '$doctor', '$appointment_date', '$appointment_time')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Appointment booked successfully!";
    } else {
        $_SESSION['success_message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: Bookappoinment.php");
    exit();
}

$conn->close();
?>